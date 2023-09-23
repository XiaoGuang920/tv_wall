<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function getAlbumList($album_start_place) {
        $resp_album_list = null;
        
        if (isset($album_start_place) && $album_start_place !== '') {
            $resp_album_list = array();

            $album_list = DB::table('album')->skip((int)$album_start_place)->take(8)->get();
            $total_album_amount = DB::table('album')->get()->count();

            if ($total_album_amount > 8 && $album_list->count() < 8) {
                $needed_num = 8 - $album_list->count();
                $album_temp = $album_list;
                
                $album_list = DB::table('album')->skip(0)->take((int)$needed_num)->get();
                $resp_album_list = array_merge($album_temp, $album_list);
            } else if ($total_album_amount < 8) {
                $resp_album_list = DB::table('album')->skip(0)->take(8)->get();
            } else {
                $resp_album_list = $album_list;
            }
        }

        return $resp_album_list;
    }

    public function getAlbumAmount() {
        $album_amount = DB::table('album')->get()->count();

        return $album_amount;
    }

    public function getPictureList($album_id, $load_start_position) {
        $resp_picture_list = null;

		if (isset($album_id) && $album_id) {
            $picture_list = DB::table('picture')->where('album_id', (int)$album_id)->skip((int)$load_start_position)->take(60)->get();
            $picture_amount = DB::table('picture')->where('album_id', (int)$album_id)->count();

			if ($picture_amount > 60 && $picture_list->count() < 60) {
				$needed_num = 60 - $picture_list->count();
				$temporary_picture_list = $picture_list;

				$picture_list = DB::table('picture')->where('album_id', (int)$album_id)->skip(0)->take((int)$needed_num)->get();
				$resp_picture_list = array_merge($temporary_picture_list, $picture_list);
			} else if ($picture_amount < 60) {
				$resp_picture_list = DB::table('picture')->where('album_id', (int)$album_id)->get();
			} else {
				$resp_picture_list = $picture_list;
			}
		}

		return $resp_picture_list;
    }

    public function getPicturesAmount($album_id) {
		$picture_amount = null;

		if (isset($album_id) && $album_id) {
            $picture_amount = DB::table('picture')->where('album_id', (int)$album_id)->count();
		}

		return $picture_amount;
	} 

    public function getPictureDetail($picture_id) {
		$picture_data = null;

		if (isset($picture_id) && $picture_id != '') {
            $picture_data = DB::table('picture')->where('picture_id', (int)$picture_id)->get();
            $picture_data = $picture_data[0];
		} 

		return $picture_data;
	}
}
