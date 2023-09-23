<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'user';

    public function getUserData($account) {
        $user_data = null;
        
        if (isset($account) && $account != '') {
            $user_num = DB::table('user')->where('account', $account)->get()->count();
            
            $user_data = array(
                'user_id' => '',
                'name' => '',
                'account' => '',
                'password' => ''
            );
            
            if ($user_num == 1) {
                $user_info = User::where('account', (int)$account)->first();
                
                $user_data['user_id'] = $user_info->user_id;
                $user_data['name'] = $user_info->name;
                $user_data['account'] = $user_info->account;
                $user_data['password'] = $user_info->password;
            }
        }

        return $user_data;
    }
}
