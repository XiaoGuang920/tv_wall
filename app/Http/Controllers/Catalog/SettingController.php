<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Setting as ModelsSetting;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function getSetting() {
        $resp = array(
			'server_ip' => '',
			'validate' => false
		);

        $model_setting = new ModelsSetting();
        $system_setting = $model_setting->getSystemSetting();

		$resp['server_ip'] = $system_setting->server_ip;
		$resp['validate'] = true;
	
		return response()->json($resp);
    }
}
