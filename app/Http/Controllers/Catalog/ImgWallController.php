<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Image as ModelsImage;

use Illuminate\Support\Facades\Log;

class ImgWallController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Catalog\HeaderController')->index();
        $footer = app('App\Http\Controllers\Catalog\FooterController')->index();

        return view('Catalog.img_wall.index', [
            'header' => $header,
            'footer' => $footer
        ]);
    }

    public function getAlbums(Request $request) {
        $resp = array(
			'album_list' => array(),
			'album_amount' => '',
			'validate' => false
		);

		$album_start_place = $request->input('album_start_place');

        if ($album_start_place !== '') {
            $model_image = new ModelsImage();

            $resp['album_list'] = $model_image->getAlbumList($album_start_place);
            $resp['album_amount'] = $model_image->getAlbumAmount();
            $resp['validate'] = true;
        }

		return response()->json($resp);
    }

    public function getPictures(Request $request, ModelsImage $model_image) {
        $resp = array(
			'picture_list' => array(),
			'picture_amount' => '',
			'validate' => false
		);

        if (isset($request->show_album_id) && $request->show_album_id) {
            $show_album_id = $request->show_album_id;
        } else {
            $show_album_id = '';
        }
        if (isset($request->load_start_position) && $request->load_start_position) {
            $load_start_position = $request->load_start_position;
        } else {
            $load_start_position = 0;
        }

		if ($show_album_id && $load_start_position !== '') {
            $picture_list = $model_image->getPictureList($show_album_id, $load_start_position);

            foreach ($picture_list as $picture) {
                $resp['picture_list'][] = array(
                    'picture_id' => $picture->picture_id,
				    'url'        => $picture->url
                );
            }

            $resp['picture_amount'] = $model_image->getPicturesAmount($show_album_id);
		    $resp['validate'] = true;
        }

		return response()->json($resp);
    }

    public function getPictureDetailData(Request $request, ModelsImage $model_image) {
		$resp = array(
			'picture_data' => null,
			'validate'     => false
		);

		if (isset($request->picture_id) && $request->picture_id) {
			$picture_id = $request->picture_id;
		} else {
			$picture_id = '';
		}

		if ($picture_id) {
			$picture_data = $model_image->getPictureDetail($picture_id);
            $resp['picture_data'] = array(
                'url'          => $picture_data->url,
                'location'     => $picture_data->location,
                'photographer' => $picture_data->photographer,
                'upload_time'  => $picture_data->upload_time
            );

			$resp['validate'] = true;
		}

		return response()->json($resp);
	}
}
