<?php

namespace App\Console;

use App\Console\Commands\ImportCommand;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        ImportCommand::class
    ];

    protected function schedule(Schedule $schedule): void
    {

    }
}
