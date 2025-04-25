<?php
namespace App\Schedule\Tasks;

use Illuminate\Console\Scheduling\Schedule;

class ExpireRentListings
{
    public function __invoke(Schedule $schedule): void
    {
        $schedule->command('property:expire-rent')->daily();
    }
}
