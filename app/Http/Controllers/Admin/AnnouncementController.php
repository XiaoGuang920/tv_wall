<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Announcement as ModelsAnnouncement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Admin\HeaderController')->index();
        $footer = app('App\Http\Controllers\Admin\FooterController')->index();
        $sidebar = app('App\Http\Controllers\Admin\MenuController')->index();

        return view('Admin.announcement.announcement', [
            'header' => $header,
            'sidebar' => $sidebar,
            'footer' => $footer
        ]);
    }

    public function getAnnouncementList(Request $request) {
        $resp = array(
            'announcement_list' => []
        );

        if (isset($request->filter) && $request->filter) {
            $filter = $request->filter;
        } else {
            $filter = '';
        }

        $model_announcement = new ModelsAnnouncement();
        $announcement_list = $model_announcement->getAnnouncementList($filter);
        foreach ($announcement_list as $announcement) {
            $resp['announcement_list'][] = array(
                'announcement_id' => $announcement->announcement_id,
                'title' => $announcement->title,
                /*'content' => $announcement->content,
                'image' => $announcement->image,
                'author' => $announcement->author,
                'start_time' => $announcement->start_time,
                'end_time' => $announcement->end_time,
                'category_type' => $announcement->category_type,
                'upload_time' => $announcement->upload_time*/
            );
        }

        return response()->json($resp);
    }

    public function uploadAnnouncement(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->title) && $request->title) {
            $title = $request->title;
        } else {
            $title = '';
        }
        if (isset($request->content) && $request->content) {
            $content = $request->content;
        } else {
            $content = '';
        }
        if (isset($request->author) && $request->author) {
            $author = $request->author;
        } else {
            $author = '';
        }
        if (isset($request->category_type) && $request->category_type) {
            $category_type = $request->category_type;
        } else {
            $category_type = '';
        }
        if (isset($request->start_time) && $request->start_time) {
            $start_time = $request->start_time;
        } else {
            $start_time = '';
        }
        if (isset($request->end_time) && $request->end_time) {
            $end_time = $request->end_time;
        } else {
            $end_time = '';
        }
        if (isset($request->image) && $request->image) {
            $image = $request->image;
        } else {
            $image = '';
        }

        if ($title && $content && $author && $category_type && $start_time && $end_time) {
            $announcement_info = array(
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'category_type' => $category_type,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'image' => ''
            );

            if (isset($image) && $image && $image != 'null') {
                $storage_path = Storage::put('/public', $image);
                $file_name = Storage::url($storage_path);

                $announcement_info['image'] = $file_name;
            } 

            $model_announcement = new ModelsAnnouncement();
            $model_announcement->insertAnnouncement($announcement_info);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function showAnnouncementInfo(Request $request) {
        $resp = array(
            'announcement_info' => null,
            'validate' => false,
            'msg' => null
        );

        if (isset($request->announcement_id) && $request->announcement_id) {
            $announcement_id = $request->announcement_id;
        } else {
            $announcement_id = '';
        }

        if ($announcement_id) {
            $model_announcement = new ModelsAnnouncement();

            $announcement_info = $model_announcement->getAnnouncementInfo($announcement_id);
            $resp['announcement_info'] = array(
                'announcement_id' => $announcement_info->announcement_id,
                'title' => $announcement_info->title,
                'content' => $announcement_info->content,
                'image' => $announcement_info->image,
                'author' => $announcement_info->author,
                'start_time' => $announcement_info->start_time,
                'end_time' => $announcement_info->end_time,
                'category_type' => $announcement_info->category_type,
                'upload_time' => $announcement_info->upload_time
            );

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function updateAnnouncement(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->edit_announcement_id) && $request->edit_announcement_id) {
            $announcement_id = $request->edit_announcement_id;
        } else {
            $announcement_id = '';
        }
        if (isset($request->title) && $request->title) {
            $title = $request->title;
        } else {
            $title = '';
        }
        if (isset($request->content) && $request->content) {
            $content = $request->content;
        } else {
            $content = '';
        }
        if (isset($request->author) && $request->author) {
            $author = $request->author;
        } else {
            $author = '';
        }
        if (isset($request->category_type) && $request->category_type) {
            $category_type = $request->category_type;
        } else {
            $category_type = '';
        }
        if (isset($request->start_time) && $request->start_time) {
            $start_time = $request->start_time;
        } else {
            $start_time = '';
        }
        if (isset($request->end_time) && $request->end_time) {
            $end_time = $request->end_time;
        } else {
            $end_time = '';
        }
        if (isset($request->image) && $request->image) {
            $image = $request->image;
        } else {
            $image = '';
        }

        if ($announcement_id && $title && $content && $author && $category_type && $start_time && $end_time) {
            $announcement_info = array(
                'announcement_id' => $announcement_id,
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'category_type' => $category_type,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'image' => ''
            );

            $model_announcement = new ModelsAnnouncement();

            if (isset($image) && $image && $image != 'null') {
                $announcement_info = $model_announcement->getAnnouncementInfo($announcement_id);
                if (Storage::exists('/public', $announcement_info->image)) {
                    Storage::delete(str_replace('/storage', 'public', $announcement_info->image));
                }
                $storage_path = Storage::put('/public', $image);
                $file_name = Storage::url($storage_path);

                $announcement_info['image'] = $file_name;
            } 

            $model_announcement->updateAnnouncement($announcement_info);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function deleteAnnouncement(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->announcement_id) && $request->announcement_id) {
            $announcement_id = $request->announcement_id;
        } else {
            $announcement_id = '';
        }

        if ($announcement_id) { 
            $model_announcement = new ModelsAnnouncement();

            $announcement_info = $model_announcement->getAnnouncementInfo($announcement_id);
            if (Storage::exists('/public', $announcement_info->image)) {
                Storage::delete(str_replace('/storage', 'public', $announcement_info->image));
            }

            $model_announcement->deleteAnnouncement($announcement_id);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }
}