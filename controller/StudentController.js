const students = require("../data/student");

//membuat Class Student COntroller
class StudentController {
    index(req, res) {
        const data = {
            message: "menampilkan semua students",
            data : students,
        };
        
        res.json(data);
    }

    store(req, res) {
        const {nama} = req.body;
        students.push(nama);

        const data = {
            message: "Menampilkan data student: ${nama}",
            data : students,
        };
        
        res.json(data);
    }

    update(req, res){
        const {id} = req.params;
        const {nama} = req.body;
        students[id] = nama;

        const data = {
            message: "Mengedit student id ${id}, nama ${nama}",
            data : students,
        };
        
        res.json(data);
    }

    destroy(req, res) {
        const {id} = req.params;
        students.splice(id,1);

        const data = {
            message: "Menghapus student id ${id}",
            data : students,
        };
        
        res.json(data);
    }
}

//membuat object StunderController
const object = new StudentController();

// Export Object StundentCOntroller
module.exports = object;