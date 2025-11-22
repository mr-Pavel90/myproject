<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WordService;

class WordCommand extends Command
{
    protected $signature = 'word';
    protected $description = 'write 10 random words to text file';

    public function handle(WordService $service)
    {
        $service->writeRandomWords();
        $this->info('done!');
        return Command::SUCCESS;
    }
}
