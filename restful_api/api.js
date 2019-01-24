const express = require('express');
const bodyParser = require("body-parser");
const mysql = require("mysql");

// const hostname = '10.64.128.131';
const hostname = 'localhost';
const port = 3000;

const app = express();

const router = express.Router();

// required to parse body of HTTP request
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());


// Init params DB connection
let connection = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: 'bracket',
	database: 'bde_site'
})

// Actual connection to DB
connection.connect(err => {
	if (err) throw err
	console.log('Connected. . .')
})

// API route :field is the name of the column we want to SELECT and :value is the value selected
// Example : /bde_site/api/user/id_user/3/
router.route('/bde_site/api/:table/:field?/:value?/')

	// HTTP GET verb
	.get((req, res) => {

		let table = req.params.table;
		let field = req.params.field;
		let value = req.params.value;

		let r = 'SELECT * FROM ' + table;

		// If :field and :value are defined, add WHERE statement
		if (field != undefined && value != undefined) r += " WHERE " + field + "='" + value + "'";

		if (table == "event") {
				r = "SELECT e.*, u.name FROM  event e INNER JOIN user u ON e.id_user = u.id_user"; 
				if (field === date) r += "WHERE e." + field + "=" + value;
				if (field === is_approved) r += "WHERE e." + field + "=" + value;
				if (field === is_public) r += "WHERE e." + field + "=" + value;

		} else if (table === "picture") {
			r = "SELECT p.*, u.first_name FROM picture p INNER JOIN user u ON p.id_user = u.id_user WHERE p." + field + "=" + value;
		} else if (table === "comment") {
			r = "SELECT c.*, u.first_name, p.url  FROM comment c INNER JOIN picture p ON p.id_picture = c.id_picture " +
				"INNER JOIN user u ON u.id_user = p.id_user WHERE c." + field + " = " + value;
		}

		connection.query(r, (err, result) => {
			if (err) throw err
			res.json(result);
		})
	})
	// HTTP POST verb
	.post((req, res) => {
		let keys = Object.keys(req.body).toString();

		let values = Object.values(req.body).map(x => "'" + x + "'").join(",");

		let r = 'INSERT INTO ' + req.params.table + ' (' + keys + ')' + ' VALUES  (' + values + ')'

		connection.query(r, (error, results, fields) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})
	// HTTP PUT verb
	.put((req, res) => {
		let columns = Object.keys(req.body);

		let r = 'UPDATE ' + req.params.table + ' SET ' + Object.values(req.body).map((x, i) => columns[i] + "='" + x + "'")
			+ ' WHERE ' + req.params.field + '=' + req.params.value;

		connection.query(r, (error, results, fields) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})
	// HTTP DELETE verb
	.delete((req, res) => {
		let r = 'DELETE FROM ' + req.params.table + ' WHERE ' + req.params.field + '=' + req.params.value;

		connection.query(r, (error, results) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})


// Nous demandons à l'application d'utiliser notre routeur
app.use(router);

// Démarrer le serveur 
app.listen(port, hostname, () => {
	console.log("Running on http://" + hostname + ":" + port + '. . .');
});	