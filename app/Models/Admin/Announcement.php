<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Announcement extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'announcement';

    public function getAnnouncementList($filter) {
        $announcement_list = null;

        $sql = "SELECT * FROM announcement";

        if ($filter) {
            $sql .= " WHERE category_type = '" . $filter . "'";
        }

        $announcement_list = DB::select($sql);

        return $announcement_list;
    }

    public function insertAnnouncement($announcement_info) {
        if ($announcement_info['title'] && $announcement_info['content'] && $announcement_info['author'] && $announcement_info['category_type'] && $announcement_info['start_time'] && $announcement_info['end_time']) {
            $bindings = [NULL, $announcement_info['title'], $announcement_info['content'], $announcement_info['image'], $announcement_info['author'], $announcement_info['start_time'], $announcement_info['end_time'], $announcement_info['category_type']];
            DB::insert('INSERT INTO announcement (announcement_id, title, content, image, author, start_time, end_time, category_type, upload_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())', $bindings);
        }
    }

    public function updateAnnouncement($announcement_info) {
        if ($announcement_info['announcement_id'] && $announcement_info['title'] && $announcement_info['content'] && $announcement_info['author'] && $announcement_info['category_type'] && $announcement_info['start_time'] && $announcement_info['end_time']) {
            Log::debug('AAA');
            $bindings = [$announcement_info['title'], $announcement_info['content'], $announcement_info['author'], $announcement_info['start_time'], $announcement_info['end_time'], $announcement_info['category_type'], $announcement_info['announcement_id']];
            DB::update("UPDATE announcement SET title = ?, content = ?, author = ?, start_time = ?, end_time = ?, category_type = ? WHERE announcement_id = ?", $bindings);

            if ($announcement_info['image']) {
                $bindings = [ $announcement_info['image'], $announcement_info['announcement_id'] ];
                DB::update("UPDATE announcement SET image = ? WHERE announcement_id = ?", $bindings);
            }
        }
    }

    public function getAnnouncementInfo($announcement_id) {
        $announcement_info = null;

        if ($announcement_id) {
            $bindings = [ $announcement_id ];
            $temp_announcement = DB::select('SELECT * FROM announcement WHERE announcement_id = ?', $bindings);
            
            $announcement_info = $temp_announcement[0];
        }

        return $announcement_info;
    }

    public function deleteAnnouncement($announcement_id) {
        if ($announcement_id) {
            $bindings = [$announcement_id];
            DB::delete('DELETE FROM announcement WHERE announcement_id = ?', $bindings);
        }
    }
    
    public function getAnnouncementQuantity() {
        $announcement_quantity = null;

        $announcement_info = DB::select("SELECT COUNT(announcement_id) FROM announcement");
        $announcement_quantity = reset($announcement_info[0]);

        return $announcement_quantity;
    }
}
