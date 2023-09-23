<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Teacher as ModelsTeacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Admin\HeaderController')->index();
        $footer = app('App\Http\Controllers\Admin\FooterController')->index();
        $sidebar = app('App\Http\Controllers\Admin\MenuController')->index();

        return view('Admin.teacher.teacher', [
            'header' => $header,
            'sidebar' => $sidebar,
            'footer' => $footer
        ]);
    }

    public function getTeacherList() {
        $resp = array(
            'teacher_list' => []
        );

        $model_teacher = new ModelsTeacher();
        
        $teacher_list = $model_teacher->getAllTeachers();
        foreach ($teacher_list as $teacher) {
            $push_teacher = array(
                'teacher_id' => $teacher->teacher_id,
                'name' => $teacher->name,
                'avatar' => $teacher->avatar
            );
            
            $resp['teacher_list'][] = $push_teacher;
        }

        return response()->json($resp);
    }

    public function getTeacherInfo(Request $request) {
        $resp = array(
            'teacher_info' => '',
            'education_list' => '',
            'expertise_list' => '',
            'validate' => false
        );

        if (isset($request->edit_teacher_id) && $request->edit_teacher_id) {
            $teacher_id = $request->edit_teacher_id;
        } else {
            $teacher_id = '';
        }

        if ($teacher_id) {
            $model_teacher = new ModelsTeacher();

            $teacher_info = $model_teacher->getTeacherInfo($teacher_id);
            $resp['teacher_info'] = array(
                'name' => $teacher_info->name,
                'email' => $teacher_info->email,
                'avatar' => $teacher_info->avatar,
                'office' => $teacher_info->office,
                'telephone' => $teacher_info->telephone
            );

            $resp['education_list'] = [];
            $education_list = $model_teacher->getTeacherEducations($teacher_id);
            foreach ($education_list as $education) {
                $resp['education_list'][] = $education->education;
            }

            $resp['expertise_list'] = [];
            $expertise_list = $model_teacher->getTeacherExpertises($teacher_id);
            foreach ($expertise_list as $expertise) {
                $resp['expertise_list'][] = $expertise->expertise;
            }

            $resp['validate'] = true;
        }

        return response()->json($resp);
    }

    public function removeTeacher(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->teacher_id) && $request->teacher_id) {
            $teacher_id = $request->teacher_id;
        } else {
            $teacher_id = '';
        }

        if ($teacher_id) {
            $model_teacher = new ModelsTeacher();

            $teacher_info = $model_teacher->getTeacherInfo($teacher_id);
            if (Storage::exists('/public', $teacher_info->avatar)) {
                Storage::delete(str_replace('/storage', 'public', $teacher_info->avatar));
            }

            $model_teacher->removeTeacher($teacher_id);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function uploadTeacherInfo(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->avatar) && $request->avatar) {
            $avatar = $request->avatar;
        } else {
            $avatar = '';
        }
        if (isset($request->name) && $request->name) {
            $name = $request->name;
        } else {
            $name = '';
        }
        if (isset($request->email) && $request->email) {
            $email = $request->email;
        } else {
            $email = '';
        }
        if (isset($request->telephone) && $request->telephone) {
            $telephone = $request->telephone;
        } else {
            $telephone = '';
        }
        if (isset($request->office) && $request->office) {
            $office = $request->office;
        } else {
            $office = '';
        }
        if (isset($request->education_list) && $request->education_list) {
            $education_list = explode(',', $request->education_list);
        } else {
            $education_list = '';
        }
        if (isset($request->expertise_list) && $request->expertise_list) {
            $expertise_list = explode(',', $request->expertise_list);
        } else {
            $expertise_list = '';
        }

        if ($avatar && $name && $email && $telephone && $office && $education_list && $expertise_list) {
            $storage_path = Storage::put('/public', $avatar);
            $file_name = Storage::url($storage_path);

            $model_teacher = new ModelsTeacher();
            $teacher_info = array(
                'name'      => $name,
                'email'     => $email,
                'avatar'    => $file_name,
                'telephone' => $telephone,
                'office'    => $office
            );
            $teacher_id = $model_teacher->createNewTeacher($teacher_info);

            foreach ($education_list as $education) {
                $model_teacher->insertEducation($teacher_id, $education);
            }

            foreach ($expertise_list as $expertise) {
                $model_teacher->insertExpertise($teacher_id, $expertise);
            }

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function editTeacherInfo(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->edit_teacher_id) && $request->edit_teacher_id) {
            $edit_teacher_id = $request->edit_teacher_id;
        } else {
            $edit_teacher_id = '';
        }
        if (isset($request->avatar) && $request->avatar) {
            $avatar = $request->avatar;
        } else {
            $avatar = '';
        }
        if (isset($request->name) && $request->name) {
            $name = $request->name;
        } else {
            $name = '';
        }
        if (isset($request->email) && $request->email) {
            $email = $request->email;
        } else {
            $email = '';
        }
        if (isset($request->telephone) && $request->telephone) {
            $telephone = $request->telephone;
        } else {
            $telephone = '';
        }
        if (isset($request->office) && $request->office) {
            $office = $request->office;
        } else {
            $office = '';
        }
        if (isset($request->education_list) && $request->education_list) {
            $education_list = explode(',', $request->education_list);
        } else {
            $education_list = '';
        }
        if (isset($request->expertise_list) && $request->expertise_list) {
            $expertise_list = explode(',', $request->expertise_list);
        } else {
            $expertise_list = '';
        }

        if ($edit_teacher_id && $name && $email && $telephone && $office && $education_list && $expertise_list) {
            $model_teacher = new ModelsTeacher();

            $teacher_info = array(
                'name'      => $name,
                'email'     => $email,
                'avatar'    => null,
                'telephone' => $telephone,
                'office'    => $office
            );
            
            if (isset($avatar) && $avatar != 'null') {
                $teacher_info = $model_teacher->getTeacherInfo($edit_teacher_id);
                if (Storage::exists('/public', $teacher_info->avatar)) {
                    Storage::delete(str_replace('/storage', 'public', $teacher_info->avatar));
                }

                $storage_path = Storage::put('/public', $avatar);
                $file_name = Storage::url($storage_path);
                $teacher_info['avatar'] = $file_name;
            }

            $model_teacher->updateTeacherInfo($edit_teacher_id, $teacher_info);
            
            $model_teacher->deleteEducation($edit_teacher_id);
            foreach ($education_list as $education) {
                $model_teacher->insertEducation($edit_teacher_id, $education);
            }

            $model_teacher->deleteExpertise($edit_teacher_id);
            foreach ($expertise_list as $expertise) {
                $model_teacher->insertExpertise($edit_teacher_id, $expertise);
            }

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }
}
