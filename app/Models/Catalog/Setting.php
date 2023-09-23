<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'setting';

    public function getSystemSetting() {
        $system_setting = Setting::where('system_id', '1')->first();

        return $system_setting;
    }
}
