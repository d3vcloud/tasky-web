<?php

namespace App\Console;

use App\User;

use App\Mail\SendTasksInformation;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        foreach (User::select('id','last_name','first_name','email')->get() as $user) {
            $schedule->call(function() use ($user) {
                if($user->tasks()->count() > 0)
                    Mail::to($user->email)->send(new SendTasksInformation($user));
            })->timezone(\Config::get('app.timezone'))->everyMinute();
        }

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
