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

    public function getAnnouncementDetail($announcement_id) {
        $announcement_detail = null;

        if (isset($announcement_id) && $announcement_id) {
            $announcement_detail = DB::table('announcement')->where('announcement_id', (int)$announcement_id)->get();
        }

        return $announcement_detail;
    }

    public function getScheduleData($date, $date2, $schedule_load_position) {
        $schedule_data = null;

        if (isset($date) && $date && isset($date2) && $date2 && isset($schedule_load_position) && $schedule_load_position !== '') {
            $schedule_num = DB::table('announcement')->where('start_time', '>=', $date)->where('start_time', '<', $date2)->orderBy('start_time', 'asc')->skip((int)$schedule_load_position)->take(4)->count();
            if ($schedule_num == 0) {
                $schedule_load_position = 0;
            }

            $schedule_data = DB::table('announcement')->where('start_time', '>=', $date)->where('start_time', '<', $date2)->orderBy('start_time', 'asc')->skip((int)$schedule_load_position)->take(4)->get();
        }

        return $schedule_data;
    }

    public function getCategoryAnnouncementsData($category_type_num, $load_start_place) {
        $category_announcement = null;

        if (isset($category_type_num) && $category_type_num && isset($load_start_place) && $load_start_place !== '') {
            $category_announcement_num = DB::table('announcement')->where('category_type', (int)$category_type_num)->orderBy('announcement_id', 'desc')->skip((int)$load_start_place)->take(12)->count();
            if ($category_announcement_num == 0) {
                $load_start_place = 0;
            }

            $category_announcement = DB::table('announcement')->where('category_type', (int)$category_type_num)->orderBy('announcement_id', 'desc')->skip((int)$load_start_place)->take(12)->get();
        }

        return $category_announcement;
    }

    public function getScheduleCategoryDetail($announcement_id) {
        $category_detail = null;

        if (isset($announcement_id) && $announcement_id) {
            $query = DB::table('announcement')->where('announcement_id', (int)$announcement_id)->first();
            if ($query) {
                $category_type = $query->category_type;
                $start_time = $query->start_time;

                $category_detail = DB::table('announcement')->where('category_type', (int)$category_type)->where('start_time', '>=', $start_time)->orderBy('start_time', 'asc')->take(12)->get();
            }
        }

        return $category_detail;
    }

    public function getCategoryAnnouncementsDataAmount($category_type_num, $load_start_place) {
        $announcement_amount = null;

        if (isset($category_type_num) && $category_type_num && isset($load_start_place) && $load_start_place !== '') {
            $data_quantity = DB::table('announcement')->where('category_type', (int)$category_type_num)->orderBy('announcement_id', 'desc')->skip((int)$load_start_place)->take(12)->count();
            $announcement_amount = $data_quantity == 0 ? 0 : $load_start_place;
        }

        return $announcement_amount;
    }

    public function getScheduleDataAmount($date, $date2, $schedule_load_position) {
        $schedule_amount = null;

        if (isset($date) && $date && isset($date2) && $date2 && isset($schedule_load_position) && $schedule_load_position !== '') {
            $data_quantity = DB::table('announcement')->where('start_time', '>=', $date)->where('start_time', '<', $date2)->orderBy('start_time', 'asc')->skip((int)$schedule_load_position)->take(4)->count();
            $schedule_amount = $data_quantity == 0 ? 0 : $schedule_load_position;
        }

        return $schedule_amount;
    }
}