<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class Announcement extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getAnnouncementsData($load_start_place, $category_type_num) {
        $announcement_list = [];

        if (isset($load_start_place) && $load_start_place !== '' && isset($category_type_num) && $category_type_num != '') {
            $announcement_num = DB::table('announcement')->where('category_type', (int)$category_type_num)->orderBy('announcement_id', 'desc')->count();

            if ($announcement_num == 0) {
                $load_start_place = 0;
            }
                
            $announcement_list = DB::table('announcement')->where('category_type', (int)$category_type_num)->orderBy('announcement_id', 'desc')->skip((int)$load_start_place)->take(12)->get();
        }

        return $announcement_list;
	}

    public function getCalendarEvent($calendar_start_date, $calendar_end_date) {
        $event_list = [];

        if (isset($calendar_start_date) && $calendar_start_date != '' && isset($calendar_end_date) && $calendar_end_date != '') {
            $event_list = DB::table('announcement')->where('start_time', '>=', $calendar_start_date)->where('start_time', '<', $calendar_end_date)->pluck('category_type');
        }

        return $event_list;
    }
}
