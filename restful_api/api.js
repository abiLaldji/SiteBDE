const express = require('express');
const bodyParser = require("body-parser");
const mysql = require("mysql");

// const hostname = '10.64.128.131';
const hostname = 'localhost';
const port = 3000;

const app = express();

const router = express.Router();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

router.route('/').all((req, res) => {
	res.json({ message: "Bienvenue sur notre API ", methode: req.method });
});

let connection = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: 'bracket',
	database: 'bde_site'
})

connection.connect(err => {
	if (err) throw err
	console.log('Connected. . .')
})

router.route('/bde_site/api/:table/:field?/:value?/')

	.get((req, res) => {
		console.log(req.params);

		let r = 'SELECT * FROM ' + req.params.table

		if (req.params.field != undefined && req.params.value != undefined) r += " WHERE " + req.params.field + "='" + req.params.value + "'";

		connection.query(r, (err, result) => {
			if (err) throw err
			res.json(result);
		})
	})
	.post((req, res) => {
		console.log(req.body);
		let keys = Object.keys(req.body).toString()
		let values = Object.values(req.body).map(x => "'" + x + "'").join(",");

		switch (req.params.table) {
			case "pictures":
				// let r = 'INSERT INTO ' + req.params.table + ' (' + keys + ') ' + 'VALUES (' + values + ')'
				connection.query(r, (error, results, fields) => {
					if (error) throw error;
					res.end(JSON.stringify(results));
				});
				break;

			case "event":
				connection.query('INSERT INTO ' + req.params.table + ' (' + keys + ')' + ' VALUES  (' + values + ')', (error, results, fields) => {
					if (error) throw error;
					res.end(JSON.stringify(results));
				});
				break;
			case "product":
			case "user":
				let r = 'INSERT INTO ' + req.params.table + ' (' + keys + ')' + ' VALUES  (' + values + ')'
				connection.query(r, (error, results, fields) => {
					if (error) throw error;
					res.end(JSON.stringify(results));
				});
				break;
		}
	})
	.put((req, res) => {
		let columns = Object.keys(req.body);

		let r = 'UPDATE ' + req.params.table + ' SET ' + Object.values(req.body).map((x, i) => columns[i] + "='" + x + "'")
			+ ' WHERE ' + req.params.field + '=' + req.params.value;

		connection.query(r, (error, results, fields) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})
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