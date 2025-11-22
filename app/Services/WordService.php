<?php

namespace App\Services;

class WordService
{
    public function writeRandomWords()
    {
        $words = [];

        for ($i = 0; $i < 10; $i++) {
            $words[] = fake()->word;
        }

        $line = implode(', ', $words);

        \Storage::disk('local')->put('words.txt', $line);
    }
}
