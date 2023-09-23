<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User as ModelsUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function showLoginPage() {
        $header = app('App\Http\Controllers\Admin\HeaderController')->index();
        $footer = app('App\Http\Controllers\Admin\FooterController')->index();

        return view('Admin.common.login', [
            'header' => $header,
            'footer' => $footer
        ]);
    }

    public function login(Request $request) {
        $resp = array(
            'auth' => false,
            'validate' => false,
            'msg' => null
        );

        if (isset($request->account) && $request->account) {
            $account = $request->account;
        } else {
            $account = '';
        }
        if (isset($request->password) && $request->password) {
            $password = $request->password;
        } else {
            $password = '';
        }

        if ($account && $password) {
            $model_user = new ModelsUser();
            $user_data = $model_user->getUserData($account);

            if ($user_data['user_id']) {
                if (password_verify($password, $user_data['password'])) {
                    session([
                        'user_name' => $user_data['name'], 
                        'user_account' => $account
                    ]);

                    $resp['auth'] = true;
                    $resp['validate'] = true;
                    $resp['msg'] = '';
                } else {
                    $resp['auth'] = false;
                    $resp['validate'] = true;
                    $resp['msg'] = 'account or password is wrong';
                }
            } else {
                $resp['auth'] = false;
                $resp['validate'] = true;
                $resp['msg'] = 'do not have this user';
            }
        } else {
            $resp['auth'] = false;
            $resp['validate'] = false;
            $resp['msg'] = 'require parameters not validate';
        }

        return response()->json($resp);
    }

    public function logout() {
        session()->forget('user_name');
        session()->forget('user_account');

        return redirect('/admin/login');
    }
}
