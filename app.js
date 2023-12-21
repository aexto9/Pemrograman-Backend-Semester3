// Import Express
const express = require("express");

// Import Router
const router = require("./Routes/api.js");

// Membuat Object Express
const app = express();

//Menggunakan Middleware
app.use(express.json());
app.use(express.urlencoded());

app.get("/", (req, res) => {
    res.send("Hello Express!");
});

app.get("/students", (req, res) => {
    res.send("Menampilkan semua students");
});

app.post("/students", (req, res) => {
    res.send("Menambahkan data student");
});

app.put("/students", (req, res) => {
    res.send("Mengedit student");
});

app.delete("/students", (req, res) => {
    res.send("Menghapus student");
});

// Mengedit data student
router.put("/students/:id", (req, res) => {
    const { id } = req.params;
    res.send(`Mengedit student ${id}`);
});

// Menghapus data student
router.delete("/students/:id", (req, res) => {
    const { id } = req.params;
    res.send(`Menghapus student ${id}`);
});

// Menggubnakan routing (router)
app.use(router);

// mendefinisikan Port
app.listen(3000);
