<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Announcement as ModelsAnnouncement;

use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    protected $model_announcement;

	public function __construct(ModelsAnnouncement $model_announcement) 
	{
		$this->model_announcement = $model_announcement;
	}
	
	public function index() 
	{
        $header = app('App\Http\Controllers\Catalog\HeaderController')->index();
        $footer = app('App\Http\Controllers\Catalog\FooterController')->index();;

        return view('Catalog.announcement.index', [
            'header' => $header,
            'footer' => $footer
        ]);
    }

    public function getAnnouncements(Request $request) 
	{
        $resp = array(
			'announcements_data' => array(),
			'validate'           => false
		);

        $load_start_place = $request->input('load_start_place');
        $category_type_num = $request->input('category_type_num');

        $model_announcement = new ModelsAnnouncement();

		$announcements_data = $model_announcement->getAnnouncementsData($load_start_place, $category_type_num);
        
        foreach ($announcements_data as $announcement) {
            $resp['announcements_data'][] = [
                'announcement_id' => $announcement->announcement_id,
				'title'           => $announcement->title,
				'upload_time'     => $announcement->upload_time
            ];
        }

        $resp['validate'] = true;

        return response()->json($resp);
    }

    public function generateCalendar(Request $request) 
	{
		$resp = array(
			'calendar_month' => array(),
			'current_year'   => '',
			'current_month'  => '',
			'validate'       => false
		);

        $gen_next_month = $request->input('gen_next_month');

        $model_announcement = new ModelsAnnouncement();

		if ($gen_next_month == 'yes') {
			$current_month = date('m',strtotime('+ 1 month'));
			if ($current_month == 1) {
				$current_year = date('Y',strtotime('+ 1 year'));
			} else {
				$current_year = date('Y');
			}
			$current_day = '';
			$last_year = $current_year - 1;
			$last_month_days = date('t'); 
			$this_month_days = date('t',strtotime('+ 1 month'));
			$month_start_day = date('w',strtotime("$current_year-$current_month-01"));
		} else {
			$current_year = date('Y');
			$current_month = date('m');
			$current_day = date('d');
			$last_year = $current_year - 1;
			$last_month_days = date('t',strtotime('- 1 month')); 
			$this_month_days = date('t');
			$month_start_day = date('w',strtotime("$current_year-$current_month-01"));
		}

		$fill_grid_day = 0;
		$calendar_grid = 42;
		$needed_next_month = $calendar_grid - $this_month_days - $month_start_day;

		for ($x = 0; $x < $calendar_grid; $x++) {
			if ($x < $month_start_day) {
				$calendar_date_year = 0;

				if ($current_month == 1) {
					$calendar_date_year = $last_year;
				} else {
					$calendar_date_year = $current_year;
				}
				$calendar_month[$x]['date_day']= $last_month_days - $month_start_day + $x + 1;
				if ($current_month == 1) {
					$calendar_month[$x]['date_month'] = 12;
				} else {
					$calendar_month[$x]['date_month'] = $current_month - 1;
				}
				$calendar_month[$x]['date_year'] = $calendar_date_year;
				$calendar_month[$x]['date_class'] = '#BEBEBE';
				$calendar_month[$x]['date_event_show'] = false;
				$calendar_month[$x]['teach_event_amount'] = 0;
				$calendar_month[$x]['sign_up_event_amount'] = 0;
				$calendar_month[$x]['speech_event_amount'] = 0;
				$calendar_month[$x]['project_event_amount'] = 0;
				$calendar_month[$x]['activity_event_amount'] = 0;
				$calendar_month[$x]['other_event_amount'] = 0;
				$calendar_today_date = $calendar_month[$x]['date_year'] . '-' . $calendar_month[$x]['date_month'] . '-' . $calendar_month[$x]['date_day'];
				$date_nextday = $calendar_month[$x]['date_day'] + 1;
				$calendar_today_date2 = $calendar_month[$x]['date_year'] . '-' . $calendar_month[$x]['date_month'] . '-' . $date_nextday;
				
                $calendar_date_event_data = $model_announcement->getCalendarEvent($calendar_today_date, $calendar_today_date2);
				foreach ($calendar_date_event_data as $event) {
					switch ($event['category_type']) {
						case 1:
							$calendar_month[$x]['date_event_show'] = true;				
							$calendar_month[$x]['teach_event_amount'] += 1;													
							break;

						case 2:
							$calendar_month[$x]['date_event_show'] = true;				
							$calendar_month[$x]['sign_up_event_amount'] += 1;							
							break;

						case 3:
							$calendar_month[$x]['date_event_show'] = true;					
							$calendar_month[$x]['speech_event_amount'] += 1;								
							break;

						case 4:
							$calendar_month[$x]['date_event_show'] = true;
							$calendar_month[$x]['project_event_amount'] += 1;							
							break;

						case 5:
							$calendar_month[$x]['date_event_show'] = true;					
							$calendar_month[$x]['activity_event_amount'] += 1;
							break;								

						case 6:
							$calendar_month[$x]['date_event_show'] = true;					
							$calendar_month[$x]['other_event_amount'] += 1;								
							break;
					}
				}
			} else if ($x >= $this_month_days + $month_start_day) {
				if ($fill_grid_day < $needed_next_month) {
					$fill_grid_day++; 
				}
				if ($current_month == 12) {
					$calendar_date_year = $current_year + 1;
				} else {
					$calendar_date_year = $current_year;
				}
				$calendar_month[$x]['date_day'] = $fill_grid_day;
				$calendar_month[$x]['date_month'] = $current_month + 1;
				$calendar_month[$x]['date_year'] = $calendar_date_year;
				$calendar_month[$x]['date_class'] = '#BEBEBE';
				$calendar_month[$x]['date_event_show'] = false;
				$calendar_month[$x]['teach_event_amount'] = 0;
				$calendar_month[$x]['sign_up_event_amount'] = 0;
				$calendar_month[$x]['speech_event_amount'] = 0;
				$calendar_month[$x]['project_event_amount'] = 0;
				$calendar_month[$x]['activity_event_amount'] = 0;
				$calendar_month[$x]['other_event_amount'] = 0;
				$calendar_today_date = $calendar_month[$x]['date_year'] . '-' . $calendar_month[$x]['date_month'] . '-' . $calendar_month[$x]['date_day'];
				$date_nextday = $calendar_month[$x]['date_day'] + 1;
				$calendar_today_date2 = $calendar_month[$x]['date_year'] . '-' . $calendar_month[$x]['date_month'] . '-' . $date_nextday;
				
                $calendar_date_event_data = $model_announcement->getCalendarEvent($calendar_today_date, $calendar_today_date2);
				foreach($calendar_date_event_data as $event) {
					switch ($event['category_type']) {
						case 1:
							$calendar_month[$x]['date_event_show'] = true;				
							$calendar_month[$x]['teach_event_amount'] += 1;													
							break;

						case 2:
							$calendar_month[$x]['date_event_show'] = true;				
							$calendar_month[$x]['sign_up_event_amount'] += 1;							
							break;

						case 3:
							$calendar_month[$x]['date_event_show'] = true;					
							$calendar_month[$x]['speech_event_amount'] += 1;								
							break;

						case 4:
							$calendar_month[$x]['date_event_show'] = true;
							$calendar_month[$x]['project_event_amount'] += 1;							
							break;

						case 5:
							$calendar_month[$x]['date_event_show'] = true;					
							$calendar_month[$x]['activity_event_amount'] += 1;
							break;	

						case 6:
							$calendar_month[$x]['date_event_show'] = true;					
							$calendar_month[$x]['other_event_amount'] += 1;								
							break;
					}
				}
			}
		}

		for ($d = 1; $d <= $this_month_days; $d++) {
			$calendar_month[$month_start_day + $d - 1]['date_day'] = $d;
			$calendar_month[$month_start_day + $d - 1]['date_month'] = $current_month;
			$calendar_month[$month_start_day + $d - 1]['date_year'] = $calendar_date_year;
			if ($calendar_month[$month_start_day + $d - 1]['date_day'] == $current_day && $calendar_month[$month_start_day + $d -1]['date_month'] == $current_month) {	
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#F26868';
			} else if ($calendar_month[$month_start_day + $d -1]['date_month'] == 1 && $calendar_month[$month_start_day + $d - 1]['date_day'] == 1) {
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#E88A1A';
			} else if ($calendar_month[$month_start_day + $d -1]['date_month'] == 2 && $calendar_month[$month_start_day + $d - 1]['date_day'] == 28) {
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#E88A1A';
			} else if ($calendar_month[$month_start_day + $d -1]['date_month'] == 4 && $calendar_month[$month_start_day + $d - 1]['date_day'] == 5) {
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#E88A1A';
			} else if ($calendar_month[$month_start_day + $d -1]['date_month'] == 6 && $calendar_month[$month_start_day + $d - 1]['date_day'] == 3) {
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#E88A1A';
			} else if ($calendar_month[$month_start_day + $d -1]['date_month'] == 9 && $calendar_month[$month_start_day + $d - 1]['date_day'] == 10) {
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#E88A1A';
			} else if ($calendar_month[$month_start_day + $d -1]['date_month'] == 10 && $calendar_month[$month_start_day + $d - 1]['date_day'] == 10) {
				$calendar_month[$month_start_day + $d - 1]['date_class'] = '#E88A1A';
			}
			$calendar_month[$month_start_day + $d - 1]['date_event_show'] = false;
			$calendar_month[$month_start_day + $d - 1]['teach_event_amount'] = 0;
			$calendar_month[$month_start_day + $d - 1]['sign_up_event_amount'] = 0;
			$calendar_month[$month_start_day + $d - 1]['speech_event_amount'] = 0;
			$calendar_month[$month_start_day + $d - 1]['project_event_amount'] = 0;
			$calendar_month[$month_start_day + $d - 1]['activity_event_amount'] = 0;
			$calendar_month[$month_start_day + $d - 1]['other_event_amount'] = 0;
			$calendar_today_date = $calendar_month[$month_start_day + $d - 1]['date_year'] . '-' . $calendar_month[$month_start_day + $d -1]['date_month'] . '-' . $calendar_month[$month_start_day + $d -1]['date_day'];
			$date_nextday = $calendar_month[$month_start_day + $d - 1]['date_day'] + 1;
			$calendar_today_date2 = $calendar_month[$month_start_day + $d - 1]['date_year'] . '-' . $calendar_month[$month_start_day + $d -1]['date_month'] . '-' . $date_nextday;
			
            $calendar_date_event_data = $model_announcement->getCalendarEvent($calendar_today_date, $calendar_today_date2);
			foreach ($calendar_date_event_data as $event_category_type) {
				switch ($event_category_type) {
					case 1:
						$calendar_month[$month_start_day + $d - 1]['date_event_show'] = true;					
						$calendar_month[$month_start_day + $d - 1]['teach_event_amount'] += 1;													
						break;

					case 2:
						$calendar_month[$month_start_day + $d - 1]['date_event_show'] = true;				
						$calendar_month[$month_start_day + $d - 1]['sign_up_event_amount'] += 1;							
						break;

					case 3:
						$calendar_month[$month_start_day + $d - 1]['date_event_show'] = true;					
						$calendar_month[$month_start_day + $d - 1]['speech_event_amount'] += 1;								
						break;

					case 4:
						$calendar_month[$month_start_day + $d - 1]['date_event_show'] = true;
						$calendar_month[$month_start_day + $d - 1]['project_event_amount'] += 1;							
						break;

					case 5:
						$calendar_month[$month_start_day + $d - 1]['date_event_show'] = true;					
						$calendar_month[$month_start_day + $d - 1]['activity_event_amount'] += 1;
						break;	

					case 6:
						$calendar_month[$month_start_day + $d - 1]['date_event_show'] = true;					
						$calendar_month[$month_start_day + $d - 1]['other_event_amount'] += 1;								
						break;							
				}
			}
		}

		$resp['calendar_month'] = $calendar_month;
		$resp['validate'] = true;
		$resp['current_year'] = $current_year;
		$resp['current_month'] = $current_month;

		return response()->json($resp);
	}

	public function getAnnouncementDetail(Request $request) 
	{
		$resp = array(
			'announcement_detail' => null,
			'validate'            => false
		);

		if (isset($request->announcement_id) && $request->announcement_id) {
			$announcement_id = $request->announcement_id;
		} else {
			$announcement_id = '';
		}

		if ($announcement_id) {
			$announcement_detail = $this->model_announcement->getAnnouncementDetail($announcement_id);
			foreach($announcement_detail as $announcement) {
				$resp['announcement_detail'] = array(
					'title'       => $announcement->title,
					'upload_time' => $announcement->upload_time,
					'author'      => $announcement->author,
					'content'     => $announcement->content,
					'image'       => $announcement->image,
					'start_time'  => $announcement->start_time,
					'end_time'    => $announcement->end_time
				);
			}

			$resp['validate'] = true;
		}

		return response()->json($resp);
	}

	public function getDailyScheduleData(Request $request) 
	{
		$resp = array(
			'daily_schedule_data' => array(),
			'validate'            => false
		);
		
		if (isset($request->date) && $request->date && isset($request->date_time) && $request->date_time && isset($request->schedule_load_position) && $request->schedule_load_position !== 0) {
			//$date = $request->date . ' ' . $request->date_time;
			$date = $request->date;
			$date2 = date('Y-m-d', strtotime($request->date . ' + 1 day'));
			$schedule_load_position = $request->schedule_load_position;
		} else {
			$date = date('Y-m-d');
			$date2 = date('Y-m-d', strtotime($date . ' + 1 day'));
			$schedule_load_position = 0;
		}

		if ($date && $date2 && $schedule_load_position !== '') {
			$daily_schedule = $this->model_announcement->getScheduleData($date, $date2, $schedule_load_position);
			foreach ($daily_schedule as $schedule) {
				$schedule->start_time = date('H:i', strtotime($schedule->start_time));
				$temp_daily_schedule = array(
					'announcement_id' => $schedule->announcement_id,
					'title'           => $schedule->title,
					'content'         => $schedule->content,
					'start_time'      => $schedule->start_time
				);

				$resp['daily_schedule_data'][] = $temp_daily_schedule;
			}
			
			$resp['validate'] = true;
		}

		return response()->json($resp);
	}

	public function getCategoryAnnouncements(Request $request) 
	{
		$resp = array(
			'category_announcement_data' => array(),
			'validate'                   => false
		);

		if (isset($request->category_type_num) && $request->category_type_num) {
			$category_type_num = $request->category_type_num;
		} else {
			$category_type_num = '';
		}
		if (isset($request->load_start_place) && $request->load_start_place !== '') {
			$load_start_place = $request->load_start_place;
		} else {
			$load_start_place = '';
		}

		if ($category_type_num && $load_start_place !== 0) {
			$category_announcement = $this->model_announcement->getCategoryAnnouncementsData($category_type_num, $load_start_place);
			foreach($category_announcement as $category) {
				$temp_category_announcement = array(
					'announcement_id' => $category->announcement_id,
					'title'           => $category->title,
					'upload_time'     => $category->upload_time
				);

				$resp['category_announcement_data'][] = $temp_category_announcement;
			}

			$resp['validate'] = true;
		}

		return response()->json($resp);
	}

	public function getScheduleDetail(Request $request) 
	{
		$resp = array(
			'schedule_category_detail_data' => array(),
			'validate'                      => false
		);

		if (isset($request->announcement_id) && $request->announcement_id) {
			$announcement_id = $request->announcement_id;
		} else {
			$announcement_id = '';
		}

		if ($announcement_id) {
			$schedule_category_detail = $this->model_announcement->getScheduleCategoryDetail($announcement_id);
			foreach ($schedule_category_detail as $schedule) {
				$temp_schedule_category_detail = array(
					'announcement_id' => $schedule->announcement_id,
					'title'           => $schedule->title,
					'upload_time'     => $schedule->upload_time
				);
				
				$resp['schedule_category_detail_data'][] = $temp_schedule_category_detail;
			}

			$resp['validate'] = true;
		}

		return response()->json($resp);
	}

	public function getNextCategoryAnnouncements(Request $request)
	{
		$resp = array(
			'announcements_data' => array(),
			'load_start_place'   => '',
			'validate'           => false
		);

		if (isset($request->category_type_num) && $request->category_type_num) {
			$category_type_num = $request->category_type_num;
		} else {
			$category_type_num = '';
		}
		if (isset($request->load_start_place) && $request->load_start_place) {
			$load_start_place = $request->load_start_place;
		} else {
			$load_start_place = '';
		}

		if ($category_type_num && $load_start_place !== '') {
			$announcements_data = $this->model_announcement->getCategoryAnnouncementsData($category_type_num, $load_start_place);
			foreach ($announcements_data as $announcement) {
				$temp_announcement_data = array(
					'announcement_id' => $announcement->announcement_id,
					'title'           => $announcement->title,
					'upload_time'     => $announcement->upload_time
				);
				
				$resp['announcements_data'][] = $temp_announcement_data;
			}
		
			$resp['load_start_place'] = $this->model_announcement->getCategoryAnnouncementsDataAmount($category_type_num, $load_start_place);

			$resp['validate'] = true;
		}

		return response()->json($resp);
	}

	public function getNextScheduleData(Request $request)
	{
		$resp = array(
			'daily_schedule_data'    => array(),			
			'schedule_load_position' => '',
			'validate'               => false
		);

		if (isset($request->date) && $request->date && isset($request->date_time) && $request->date_time && isset($request->schedule_load_position) && $request->schedule_load_position !== '') {
			$date = $request->date . $request->date_time;
			$date2 = date('Y-m-d', strtotime($request->date. ' + 1 day'));
			$schedule_load_position = $request->schedule_load_position;
		} else {
			$date = date('Y-m-d');
			$date2 = date('Y-m-d', strtotime($date. ' + 1 day'));
			$schedule_load_position = 0;
		}

		if ($date && $date2 && $schedule_load_position !== '') {
			$daily_schedule_data = $this->model_announcement->getScheduleData($date, $date2, $schedule_load_position);
			foreach ($daily_schedule_data as $schedule) {
				$schedule->start_time = date('H:i', strtotime($schedule->start_time));
				$temp_daily_schedule_data = array(					
					'announcement_id' => $schedule->announcement_id,
					'title'           => $schedule->title,
					'content'         => $schedule->content,
					'start_time'      => $schedule->start_time
				);
				
				$resp['daily_schedule_data'][] = $temp_daily_schedule_data;
			}

			$resp['schedule_load_position'] = $this->model_announcement->getScheduleDataAmount($date, $date2, $schedule_load_position);

			$resp['validate'] = true;
		}

		return response()->json($resp);
	}
}
