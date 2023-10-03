<?php

use Illuminate\Support\Facades\Route;

/* CATALOG CONTROLLER */
use App\Http\Controllers\Catalog\FrameController;
use App\Http\Controllers\Catalog\HomeController;
use App\Http\Controllers\Catalog\TeacherController;
use App\Http\Controllers\Catalog\ImgWallController;
use App\Http\Controllers\Catalog\AnnouncementController;
use App\Http\Controllers\Catalog\SettingController;
use App\Http\Controllers\Catalog\SpiritGameController;
use App\Http\Controllers\Catalog\TableTennisController;

/* ADMIN CONTROLLER */
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* CATALOG CONTROLLER */
Route::get('/tvWall', [FrameController::class, 'index']);

Route::post('/setting/getSetting', [SettingController::class, 'getSetting']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::post('/teacher/getAllTeacher', [TeacherController::class, 'getAllTeacher']);
Route::post('/teacher/getTeacherInfo', [TeacherController::class, 'getTeacherInfo']);

Route::get('/home', [HomeController::class, 'index']);
Route::post('/home/getWeather', [HomeController::class, 'getWeather']);
Route::post('/home/getUviAqi', [HomeController::class, 'getUviAqi']);

Route::get('/imgWall', [ImgWallController::class, 'index']);
Route::post('/imgWall/getAlbums', [ImgWallController::class, 'getAlbums']);
Route::post('/imgWall/getPictures', [ImgWallController::class, 'getPictures']);
Route::post('/imgWall/getPictureDetailData', [ImgWallController::class, 'getPictureDetailData']);

Route::get('/announcement', [AnnouncementController::class, 'index']);
Route::post('/announcement/getAnnouncements', [AnnouncementController::class, 'getAnnouncements']);
Route::post('/announcement/generateCalendar', [AnnouncementController::class, 'generateCalendar']);
Route::post('/announcement/getAnnouncementDetail', [AnnouncementController::class, 'getAnnouncementDetail']);
Route::post('/announcement/getDailyScheduleData', [AnnouncementController::class, 'getDailyScheduleData']);
Route::post('/announcement/getCategoryAnnouncements', [AnnouncementController::class, 'getCategoryAnnouncements']);
Route::post('/announcement/getScheduleDetail', [AnnouncementController::class, 'getScheduleDetail']);
Route::post('/announcement/getNextCategoryAnnouncements', [AnnouncementController::class, 'getNextCategoryAnnouncements']);
Route::post('/announcement/getNextScheduleData', [AnnouncementController::class, 'getNextScheduleData']);

Route::get('/tableTennis', [TableTennisController::class, 'index']);

Route::get('/spiritGame', [SpiritGameController::class, 'index']);

/* ADMIN CONTROLLER */
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('userAuthenticate');
Route::post('/admin/dashboard/getDataQuantity', [DashboardController::class, 'getDataQuantity']);

Route::get('/admin/teacher', [AdminTeacherController::class, 'index'])->middleware('userAuthenticate');
Route::post('/admin/teacher/getTeacherList', [AdminTeacherController::class, 'getTeacherList']);
Route::post('/admin/teacher/getTeacherInfo', [AdminTeacherController::class, 'getTeacherInfo']);
Route::post('/admin/teacher/uploadTeacherInfo', [AdminTeacherController::class, 'uploadTeacherInfo']);
Route::post('/admin/teacher/editTeacherInfo', [AdminTeacherController::class, 'editTeacherInfo']);
Route::post('/admin/teacher/removeTeacher', [AdminTeacherController::class, 'removeTeacher']);

Route::get('/admin/announcement', [AdminAnnouncementController::class, 'index'])->middleware('userAuthenticate');
Route::post('/admin/announcement/getAnnouncementList', [AdminAnnouncementController::class, 'getAnnouncementList']);
Route::post('/admin/announcement/uploadAnnouncement', [AdminAnnouncementController::class, 'uploadAnnouncement']);
Route::post('/admin/announcement/showAnnouncementInfo', [AdminAnnouncementController::class, 'showAnnouncementInfo']);
Route::post('/admin/announcement/updateAnnouncement', [AdminAnnouncementController::class, 'updateAnnouncement']);
Route::post('/admin/announcement/deleteAnnouncement', [AdminAnnouncementController::class, 'deleteAnnouncement']);

Route::get('/admin/album', [AdminAlbumController::class, 'index'])->middleware('userAuthenticate');
Route::post('/admin/album/getAlbumList', [AdminAlbumController::class, 'getAlbumList']);
Route::post('/admin/album/getAlbumInfo', [AdminAlbumController::class, 'getAlbumInfo']);
Route::post('/admin/album/uploadAlbum', [AdminAlbumController::class, 'uploadAlbum']);
Route::post('/admin/album/uploadPicture', [AdminAlbumController::class, 'uploadPicture']);
Route::post('/admin/album/deleteAlbum', [AdminAlbumController::class, 'deleteAlbum']);

Route::get('/admin/login', [UserController::class, 'showLoginPage']);
Route::post('/admin/login', [UserController::class, 'login']);

Route::get('/admin/logout', [UserController::class, 'logout']);