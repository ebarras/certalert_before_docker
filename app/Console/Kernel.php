<?php

namespace App\Console;

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
        // * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
        // * * * * * cd /home/pbarre01/Code/certalert && php artisan schedule:run >> /dev/null 2>&1

        // A good plan to speed this up is to tally a 'failed verification' table. At a count of like... 5, stop checking the site.
        // After a certain amount of time, run a task that resets that count to 0.
        $schedule->command('certs:verify')
                 //->everyMinute();
                 //->everyTenMinutes();
                 ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
