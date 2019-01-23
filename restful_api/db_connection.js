const express = require('express');
const bodyParser = require("body-parser"); 

const hostname = 'localhost'; 
const port = 3000; 

const app = express(); 
 
const myRouter = express.Router(); 

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

myRouter.route('/').all((req,res) => { 
    res.json({message : "Bienvenue sur notre API ", methode : req.method});
});
    