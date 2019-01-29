const express = require('express');
const bodyParser = require("body-parser");
const mysql = require("mysql");
require('dotenv').load();

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
router.route('/bde_site/api/:table/:field?/:value?/:add?')

	// HTTP GET verb
	.get((req, res) => {

		

		// Verify if token in header correspond with the variable in .env file
		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

		let table = req.params.table;
		let field = req.params.field;
		let value = req.params.value;

		// Request string variable
		let r;

		// SELECT request are differents depending on table name
		switch (table) {
			case 'event':
				r = process.env.getEvent;
				if (field != undefined && field != 'date') r += " WHERE e." + field + "=" + value;
				r += " GROUP BY e.id_event";
				break;
			case 'picture':
				r = process.env.getPicture;
				if (field != undefined) r += "WHERE p." + field + "=" + value;
				r += " GROUP BY p.id_picture";
				break;
			case 'comment':
				r = process.env.getComment;
				if (field != undefined) r += "WHERE c." + field + "=" + value;
				break;
			case 'subscribe':
				r = process.env.getSubscribe
				if (field != undefined) r += "WHERE e." + field + "=" + value;

				break;
			case 'purchase':
				r = process.env.getPurchase
				if (field != undefined) r += "WHERE p." + field + "=" + value;
				break;
			default:
				r = 'SELECT * FROM ' + table;

				// If :field and :value are defined, add WHERE statement
				if (field != undefined && value != undefined) r += " WHERE " + field + "='" + value + "'";
		}

		if (field === 'date') if (value === 'futur') r += "WHERE e.date > now()"; else r += "WHERE e.date <= now()";

		console.log(r);


		connection.query(r, (err, result) => {
			if (err) throw err
			res.json(result);

		})
	})
	// HTTP POST verb
	.post((req, res) => {
		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

		/*
			Insert into the field given in POST body keys.
			Then map all POST body values to a string surrounded by "'".
			If the value is a fonction, matches "name()", do not surround with "'".
		*/
		let r = 'INSERT INTO ' + req.params.table + ' (' + Object.keys(req.body).toString() + ')' +
			' VALUES  (' + Object.values(req.body).map(x => { if (!new RegExp(/.+\(\)/).test(x)) { return "'" + x + "'" } else return x }).join(",") + ')';

		console.log(r);


		connection.query(r, (error, results) => {
			if (error) throw error;
			res.end(JSON.stringify(results));
		});
	})

	// HTTP PUT verb
	.put((req, res) => {

		let table = req.params.table;
		let field = req.params.field;
		let value = req.params.value;
		let add = req.params.add;
		let r;

		if (process.env.TOKEN !== req.header("Authorization") || req.header("Authorization") === undefined) res.json({ message: "Invalid Token" })

		// :add parametre in route is meant to tell if the value has to be added to the current valu in the database
		if (add != undefined) {
			r = process.env.postAdd;

		} else {
			r = 'UPDATE ' + table + ' SET ' + Object.values(req.body).map((x, i) => Object.keys(req.body)[i] + "='" + x + "'")
				+ ' WHERE ' + field + '=' + value;
		}

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
	});

// Use the route defined before
app.use(router);

//Listen for incoming connection
app.listen(process.env.PORT, process.env.HOSTNAME, () => {
	console.log("Running on http://" + process.env.HOSTNAME + ":" + process.env.PORT + '. . .');
});