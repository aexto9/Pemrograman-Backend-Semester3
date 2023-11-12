<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {

        $statuscode = 200;
        $students = Student::all();

        if ($students->isEmpty()){
            $data = [
                'message' => 'Resource is Empty',
                'data'=>'null'
            ];

            return respone()->json(204);

        } else {
            $data = [
                'message' => 'List Semua Siswa',
                'data' => $students
            ];

            $statuscode = 200;
        }

        return response()->json($data,$statuscode);
    }

    public function show(string $id)
    {
        $statusCode = 200;
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Student Found',
                'data' => $student
            ];
        } else {
            $data = [
                'message' => 'Student Not Found',
                'data' => null
            ];

            $statusCode = 404;
        }

        return response()->json($data, $statusCode);
    }

    public function store(Request $request) {
        
        $validateData = $request->validate([
            //kolom => 'rules|rules'
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required'
        ]);
        
        $request->validate([
            "nama"=>"required",
            "nim"=>"required",
            "emial"=>"required|email",
            "jurusan"=>"required"
        ],$message);

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($validateData);

        $data = [
            'message' => 'Siswa telah berhasil Terdaftar',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, string $id) {
        
        $statusCode = 200;
        $student = Student::find($id);
        
        if ($student){
            $input -> update([
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ]);
            
            $student->update($input);

            $data = [
                'message' => 'Pembaruan data Siswa Berhasil',
                'data' => $student
            ];
        } else {
            $data = [
                'message' => 'Siswa tidak ditemukan',
                'data' => null
            ];
        }

        return response()->json($data, 200);

    }

    public function destroy(string $id) {

        $student = Student::find($id);
        $student->delete();

    if ($student){
        $data = [
            'message' => 'ID: '. $id . ' Berhasil Menghapus',
        ];
    } else {
        $data = [
            'message' => 'Siswa tidak ditemukan',
        ];

        $statusCode = 404;
    }

        return response()->json($data, 200);

    }
}