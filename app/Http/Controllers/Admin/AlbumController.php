<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Album as ModelsAlbum;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Admin\HeaderController')->index();
        $footer = app('App\Http\Controllers\Admin\FooterController')->index();
        $sidebar = app('App\Http\Controllers\Admin\MenuController')->index();

        return view('Admin.album.album', [
            'header' => $header,
            'sidebar' => $sidebar,
            'footer' => $footer
        ]);
    }

    public function getAlbumList() {
        $resp = array(
            'album_list' => []
        );

        $model_album = new ModelsAlbum();
        
        $album_list = $model_album->getAllAlbums();
        foreach ($album_list as $album) {
            $push_album = array(
                'album_id' => $album->album_id,
                'name' => $album->name
            );
            
            $resp['album_list'][] = $push_album;
        }

        return response()->json($resp);
    }

    public function getAlbumInfo(Request $request) {
        $resp = array(
            'name' => null,
            'upload_time' => null,
            'location' => null,
            'photographer' => null,
            'picture_list' => null,
            'validate' => false,
            'msg' => null
        );

        if (isset($request->album_id) && $request->album_id) {
            $album_id = $request->album_id;
        } else {
            $album_id = '';
        }

        if ($album_id) {
            $model_album = new ModelsAlbum();

            $album_info = $model_album->getAlbumInfo($album_id);
            $resp['name'] = $album_info['name'];

            $picture_list = $model_album->getPictureList($album_id);
            $resp['picture_list'] = [];
            foreach ($picture_list as $key => $picture) {
                if ($key == 0) {
                    $resp['upload_time'] = $picture->upload_time;
                    $resp['location'] = $picture->location;
                    $resp['photographer'] = $picture->photographer;
                }

                $resp['picture_list'][] = $picture->url;
            }

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function uploadAlbum(Request $request) {
        $resp = array(
            'album_id' => '',
            'validate' => false,
            'msg' => null
        );

        if (isset($request->name) && $request->name) {
            $name = $request->name;
        } else {
            $name = '';
        }

        if ($name) {
            $model_album = new ModelsAlbum();
            $resp['album_id'] = $model_album->createNewAlbum($name);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function uploadPicture(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->album_id) && $request->album_id) {
            $album_id = $request->album_id;
        } else {
            $album_id = '';
        }
        if (isset($request->picture) && $request->picture) {
            $picture = $request->picture;
        } else {
            $picture = '';
        }
        if (isset($request->photographer) && $request->photographer) {
            $photographer = $request->photographer;
        } else {
            $photographer = '';
        }
        if (isset($request->location) && $request->location) {
            $location = $request->location;
        } else {
            $location = '';
        }

        if ($album_id && $picture && $photographer && $location) { 
            $storage_path = Storage::put('/public', $picture);
            $file_name = Storage::url($storage_path);

            $picture_info = array(
                'location' => $location,
                'photographer' => $photographer,
                'url' => $file_name,
                'album_id' => $album_id
            );

            $model_album = new ModelsAlbum();
            $model_album->insertPicture($picture_info);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function deleteAlbum(Request $request) {
        $resp = array(
            'validate' => false,
            'msg' => null
        );

        if (isset($request->album_id) && $request->album_id) {
            $album_id = $request->album_id;
        } else {
            $album_id = '';
        }

        if ($album_id) { 
            $model_album = new ModelsAlbum();

            $model_album->deleteAlbum($album_id);

            $picture_list = $model_album->getPictureList($album_id);
            foreach ($picture_list as $key => $picture) {
                if (Storage::exists('/public', $picture->url)) {
                    Storage::delete(str_replace('/storage', 'public', $picture->url));
                }
            }

            $model_album->deletePicture($album_id);

            $resp['validate'] = true;
            $resp['msg'] = '';
        } else {
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }
}
