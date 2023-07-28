<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('inspire')->everyMinute();

         $schedule->call(function () {

            $now = Carbon::now();
            $date_intervale = $now->subDay();
            $vrai_date = \Carbon\Carbon::createFromDate($date_intervale);


            $user = User::query()
                    ->select('users.nom','users.prenom','users.souscrit','users.created_at')
                    ->join('professional_users','professional_users.user_id','=','users.id')
                    ->where('professional_users.date_fin','<',date('Y-m-d'))
                    ->where('users.souscrit','=',1)
                    ->get();


            foreach($user as $users){
                $users->update([
                    'souscrit' => 0
                ]);
            }

        })->hourly();
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
