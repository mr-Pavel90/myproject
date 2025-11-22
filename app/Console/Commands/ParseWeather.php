<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherParser;

class ParseWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parse weather and save db';

    /**
     * Execute the console command.
     *
     * @return int
     */
   public function handle(WeatherParser $parser)
    {
        $count = $parser->run();

        $this->info("✅ successfully recorded {$count} recorded about weather!");
    }
}
