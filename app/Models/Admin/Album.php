<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Album extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'album';

    public function getAllAlbums() {
        $album_list = Album::all();

        return $album_list;
    }

    public function createNewAlbum($album_name) {
        $album_id = null;

        if ($album_name) {
            $bindings = [NULL, $album_name];
            DB::insert('INSERT INTO album (album_id, name) VALUES (?, ?)', $bindings);

            $query = DB::table('album')->orderByDesc('album_id')->take(1)->get('album_id');
            $album_id = $query[0]->album_id;
        }

        return $album_id;
    }

    public function insertPicture($picture_info) {
        if ($picture_info['location'] && $picture_info['photographer'] && $picture_info['album_id'] && $picture_info['url']) {
            $bindings = [NULL, $picture_info['url'], $picture_info['location'], $picture_info['photographer'], (int)$picture_info['album_id']];
            DB::insert('INSERT INTO picture (picture_id, url, upload_time, location, photographer, album_id) VALUES (?, ?, NOW(), ?, ?, ?)', $bindings);
        }
    }

    public function getAlbumInfo($album_id) {
        $album_info = null;

        if ($album_id) {
            $album_info = DB::table('album')->where('album_id', (int)$album_id)->get();

            $album_temp = array(
                'name' => $album_info[0]->name
            );

            $album_info = $album_temp;
        }

        return $album_info;
    }

    public function getPictureList($album_id) {
        $picture_list = null;

        if ($album_id) {
            $picture_list = DB::table('picture')->where('album_id', $album_id)->get();
        }

        return $picture_list;
    }

    public function deleteAlbum($album_id) {
        if ($album_id) {
            $bindings = [$album_id];
            DB::delete('DELETE FROM album WHERE album_id = ?', $bindings);
        }
    }

    public function deletePicture($album_id) {
        if ($album_id) {
            $bindings = [$album_id];
            DB::delete('DELETE FROM picture WHERE album_id = ?', $bindings);
        }
    }

    public function getAlbumQuantity() {
        $album_quantity = null;

        $album_info = DB::select("SELECT COUNT(album_id) FROM album");
        $album_quantity = reset($album_info[0]);

        return $album_quantity;
    }

    public function getPictureQuantity() {
        $picture_quantity = null;

        $picture_info = DB::select("SELECT COUNT(picture_id) FROM picture");
        $picture_quantity = reset($picture_info[0]);

        return $picture_quantity;
    }
}
