<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'jurusan'
    ];

    public function getStudents(){
        $data = DB::table('students')->get();

        return $data;
    }
}