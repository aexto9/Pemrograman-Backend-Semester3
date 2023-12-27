// import Model Student
const Student = require("../models/Student");

class StudentController {
    async index(req, res) {

        const students = await Student.all();

        const data = {
            message: "Menampilkkan semua students",
            data: students,
        };

        res.json(data);
    }

    async store(req, res) {
        
        const students = await Student.create(req.body);

        const data = {
            message: "Menambahkan data student",
            data: {
                nama: req.body.nama,
                nim: req.body.nim,
                email: req.body.email,
                jurusan: req.body.jurusan,
            },
        };

        res.json(data);
    }

    update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;

        const data = {
            message: `Mengedit student id ${id}, nama ${nama}`,
            data: [],
        };

        res.json(data);
    }

    destroy(req, res) {
        const { id } = req.params;

        const data = {
            message: `Menghapus student id ${id}`,
            data: [],
        };

        res.json(data);
    }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;