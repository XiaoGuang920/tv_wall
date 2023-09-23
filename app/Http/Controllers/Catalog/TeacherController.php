<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Teacher as ModelsTeacher;

class TeacherController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Catalog\HeaderController')->index();
        $footer = app('App\Http\Controllers\Catalog\FooterController')->index();;

        return view('Catalog.teacher.index', [
            'header' => $header,
            'footer' => $footer
        ]);
    }

    public function getAllTeacher(Request $request) {
        $resp = array(
            'teacher_list' => [],
            'validate' => false
        );

        $model_teacher = new ModelsTeacher();

		$teacher_list = $model_teacher->getAllTeachers();
		
		foreach ($teacher_list as $teacher) {
			$push_teacher = array(
				'teacher_id' => $teacher['teacher_id'],
				'name' => $teacher['name'],
				'office' => $teacher['office'],
				'avatar' => $teacher['avatar']
			);

			array_push($resp['teacher_list'], $push_teacher);
		}

		$resp['validate'] = true;

        return response()->json($resp);
    }

    public function getTeacherInfo(Request $request) {
        $resp = array(
			'teacher_data' => null,
			'education_list' => [],
			'expertise_list' => [],
			'validate' => false
		);

		if ($request->input('teacher_id')) {
			$teacher_id = $request->input('teacher_id');
		} else {
			$teacher_id = '';
		}

		if ($teacher_id) {
            $model_teacher = new ModelsTeacher();

            $teacher_info = $model_teacher->getTeacherInfo($teacher_id);
            $teacher_educations = $model_teacher->getTeacherEducations($teacher_id);
            $teacher_expertises = $model_teacher->getTeacherExpertises($teacher_id);
			
			if (isset($teacher_educations) && isset($teacher_expertises)) {
				$resp['teacher_data'] = array(
					'name' => $teacher_info['name'],
					'avatar' => $teacher_info['avatar'],
					'email' => $teacher_info['email'],
					'office' => $teacher_info['office'],
					'telephone' => $teacher_info['telephone']
				);

				foreach ($teacher_educations as $education) {
					array_push($resp['education_list'], $education->education);
				}
					
				foreach ($teacher_expertises as $expertise) {
					array_push($resp['expertise_list'], $expertise->expertise);
				}

				$resp['validate'] = true;
			}
		}

		return response()->json($resp);
    }
}
