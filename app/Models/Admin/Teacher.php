<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function createNewTeacher($teacher_info) {
        $teacher_id = null;

        if ($teacher_info['name'] && $teacher_info['email'] && $teacher_info['avatar'] && $teacher_info['telephone'] && $teacher_info['office']) {
            $bindings = [NULL, $teacher_info['name'], $teacher_info['email'], $teacher_info['telephone'], $teacher_info['office'], $teacher_info['avatar']];
            DB::insert('INSERT INTO teacher (teacher_id, name, email, telephone, office, avatar) VALUES (?, ?, ?, ?, ?, ?)', $bindings);

            $query = DB::table('teacher')->orderByDesc('teacher_id')->take(1)->get('teacher_id');
            $teacher_id = $query[0]->teacher_id;
        }

        return $teacher_id;
    }

    public function insertEducation($teacher_id, $education) {
        if ($teacher_id && $education) {
            $bindings = [NULL, $education, $teacher_id];
            DB::insert('INSERT INTO teacher_education (education_id, education, teacher_id) VALUES (?, ?, ?)', $bindings);
        }
    }

    public function insertExpertise($teacher_id, $expertise) {
        if ($teacher_id && $expertise) {
            $bindings = [NULL, $expertise, $teacher_id];
            DB::insert('INSERT INTO teacher_expertise (expertise_id, expertise, teacher_id) VALUES (?, ?, ?)', $bindings);
        }
    }

    public function removeTeacher($teacher_id) {
        if ($teacher_id) {
            DB::table('teacher')->where('teacher_id', $teacher_id)->delete();
            DB::table('teacher_education')->where('teacher_id', $teacher_id)->delete();
            DB::table('teacher_expertise')->where('teacher_id', $teacher_id)->delete();
        }
    }

    public function updateTeacherInfo($teacher_id, $teacher_info) {
        if ($teacher_id && $teacher_info) {
            $bindings = [$teacher_info['name'], $teacher_info['email'], $teacher_info['telephone'], $teacher_info['office'], $teacher_id];
            DB::update('UPDATE teacher SET name = ?, email = ?, telephone = ?, office = ? WHERE teacher_id = ?', $bindings);

            if (isset($teacher_info['avatar'])) {
                $bindings = [$teacher_info['avatar'], $teacher_id];
                DB::update('UPDATE teacher SET avatar = ? WHERE teacher_id = ?', $bindings);  
            }
        }
    }

    public function deleteEducation($teacher_id) {
        if ($teacher_id) {
            $bindings = [$teacher_id];
            DB::delete('DELETE FROM teacher_education WHERE teacher_id = ?', $bindings);
        }
    }

    public function deleteExpertise($teacher_id) {
        if ($teacher_id) {
            $bindings = [$teacher_id];
            DB::delete('DELETE FROM teacher_expertise WHERE teacher_id = ?', $bindings);
        }
    }

    public function getTeacherQuantity() {
        $teacher_quantity = null;

        $teacher_info = DB::select("SELECT COUNT(teacher_id) FROM teacher");
        $teacher_quantity = reset($teacher_info[0]);

        return $teacher_quantity;
    }
}
