// Import Express
const express = require("express");

// Import Router
const router = require("./Routes/api.js");

// Membuat Object Express
const app = express();

// Menggunakan middleware
app.use(express.json());

// Menggubnakan routing (router)
app.use(router);

// mendefinisikan Port
app.listen(3000);
