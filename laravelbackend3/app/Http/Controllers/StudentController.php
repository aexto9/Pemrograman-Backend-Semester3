<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $students = (new Student())->getStudents();

        $data = [
            'message' => 'List Semua Siswa',
            'data' => $students
        ];

        return response()->json($data,200);
    }

    public function store(Request $request) {

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Siswa Terdaftar',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, string $id) {

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::find($id);
        $student->update($input);

        $data = [
            'message' => 'Pembaruan data Siswa',
            'data' => $student
        ];

        return response()->json($data, 200);

    }

    public function destroy(string $id) {

        $student = Student::find($id);
        $student->delete();

        $data = [
            'message' => 'ID: '. $id . ' Berhasil Menghapus',
        ];

        return response()->json($data, 200);

    }
}