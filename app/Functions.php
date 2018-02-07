<?php

namespace App;
use Auth;
class Functions
{
    public function byteConvert($bytes)
    {
        if ($bytes == 0)
            return "0.00 B";
    
        $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($bytes, 1024));
    
        return round($bytes/pow(1024, $e), 2).' '.$s[$e];
    }

    public function saveActivity($type="message",$message)
    {
        $activity = new TaskActivity;
        $activity->type = $type;
        $activity->message = $message;
        $activity->date_time = date('Y-m-d H:i:s');
        $activity->task_id = \Session::get('idCurrentTask');
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return $activity;
    }
}

?>