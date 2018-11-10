<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Services\Calculator;

class Calc extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'calc';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Calculate basic operations';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mathOperation = $this->ask('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)');
        $calculator = new Calculator();
        $this->info($calculator->calculate($mathOperation));
    }
}
