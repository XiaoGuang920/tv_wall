<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Teacher as ModelsTeacher;
use App\Models\Admin\Announcement as ModelsAnnouncement;
use App\Models\Admin\Album as ModelsAlbum;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Admin\HeaderController')->index();
        $footer = app('App\Http\Controllers\Admin\FooterController')->index();
        $sidebar = app('App\Http\Controllers\Admin\MenuController')->index();

        return view('Admin.common.dashboard', [
            'header' => $header,
            'sidebar' => $sidebar,
            'footer' => $footer
        ]);
    }

    public function getDataQuantity() {
        $resp = array(
            'teacher_quantity' => null,
            'announcement_quantity' => null,
            'album_quantity' => null,
            'picture_quantity' => null
        );

        $model_teacher = new ModelsTeacher();
        $resp['teacher_quantity'] = $model_teacher->getTeacherQuantity();

        $model_album = new ModelsAlbum();
        $resp['album_quantity'] = $model_album->getAlbumQuantity();
        $resp['picture_quantity'] = $model_album->getPictureQuantity();

        $model_announcement = new ModelsAnnouncement();
        $resp['announcement_quantity'] = $model_announcement->getAnnouncementQuantity();

        return response()->json($resp);
    }
}
