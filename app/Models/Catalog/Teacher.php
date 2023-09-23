<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'teacher';

    public function getAllTeachers() {
        $teacher_list = Teacher::all();

        return $teacher_list;
    }

    public function getTeacherInfo($teacher_id) {
        $teacher_info = null;

        if (isset($teacher_id) && $teacher_id !== '') {
            $teacher_info = Teacher::where('teacher_id', (int)$teacher_id)->first();
        }

        return $teacher_info;
    }

    public function getTeacherEducations($teacher_id) {
        $teacher_educations = null;

        if (isset($teacher_id) && $teacher_id !== '') {
            $teacher_educations = DB::table('teacher_education')->where('teacher_id', (int)$teacher_id)->get();
        }

        return $teacher_educations;
    }

    public function getTeacherExpertises($teacher_id) {
        $teacher_expertises = null;

        if (isset($teacher_id) && $teacher_id !== '') {
            $teacher_expertises = DB::table('teacher_expertise')->where('teacher_id', (int)$teacher_id)->get();
        }

        return $teacher_expertises;
    }
}
