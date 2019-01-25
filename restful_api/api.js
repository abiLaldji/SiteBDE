const express = require('express');
const bodyParser = require("body-parser");
const mysql = require("mysql");
require('dotenv').load();

const hostname = '10.64.128.131';
// const hostname = 'localhost';
const port = 3001;

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
		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

		let table = req.params.table;
		let field = req.params.field;
		let value = req.params.value;

		console.log(table + field);

		let r;

		switch (table) {
			case 'event':
				r = "SELECT e.*, count(v.id_event) vote_count, u.first_name, u.last_name FROM event e LEFT JOIN vote v ON e.id_event = v.id_event "
					+ "INNER JOIN user u ON u.id_user = e.id_user";
				if (field != undefined && field != 'date') r += " WHERE e." + field + "=" + value;
				r += " GROUP BY e.id_event";
				break;
			case 'picture':
				r = "SELECT p.*, u.first_name, u.last_name, COUNT(l.id_picture) like_count FROM picture p LEFT JOIN user u ON p.id_user = u.id_user" +
					" INNER JOIN likes l ON p.id_picture = l.id_picture "
				if (field != undefined) r += "WHERE p." + field + "=" + value;
				r += " GROUP BY p.id_picture";
				break;
			case 'comment':
				r = "SELECT c.*, u.first_name, p.url, u.last_name  FROM comment c INNER JOIN picture p ON p.id_picture = c.id_picture " +
					"INNER JOIN user u ON u.id_user = p.id_user WHERE c." + field + " = " + value;
				break;
			case 'subscribe':
				r = "SELECT u.first_name, u.last_name FROM subscribe s INNER JOIN event e ON s.id_event = e.id_event "
					+ "INNER JOIN user u ON u.id_user = e.id_user ";
				if (field != undefined) r += "WHERE e." + field + "=" + value;
				break;
			// case 'product':
			// 	''
			// 	// "SELECT p.*, o.date, c.quantity FROM product p INNER JOIN contain c ON c.id_product = p.id_product INNER JOIN order o ON o.id_order = c.id_order";
			// 	break;
			default:
				r = 'SELECT * FROM ' + table;

				// If :field and :value are defined, add WHERE statement
				if (field != undefined && value != undefined) r += " WHERE " + field + "='" + value + "'";
		}

		connection.query(r, (err, result) => {
			if (err) throw err
			if (field === 'date') { if (value === 'sup') result.filter(x => new Date() < x.date); };
			// console.log(result);
			res.json(result);
		})
	})
	// HTTP POST verb
	.post((req, res) => {
		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

		let keys = Object.keys(req.body).toString();

		let values = Object.values(req.body).map(x => { if (x != 'now()' && x != 'NOW()') { return "'" + x + "'" } else return x });

		values.join(",");

		let r = 'INSERT INTO ' + req.params.table + ' (' + keys + ')' + ' VALUES  (' + values + ')';

		connection.query("insert into campus value ('" + x + "')", (error, results) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})

	// HTTP PUT verb
	.put((req, res) => {
		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

		let columns = Object.keys(req.body);

		let r = 'UPDATE ' + req.params.table + ' SET ' + Object.values(req.body).map((x, i) => columns[i] + "='" + x + "'")
			+ ' WHERE ' + req.params.field + '=' + req.params.value;

		connection.query(r, (error, results) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})
	// HTTP DELETE verb
	.delete((req, res) => {
		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

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