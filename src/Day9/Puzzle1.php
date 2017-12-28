<?php
declare(strict_types = 1);

namespace Advent\Day9;

class Puzzle1
{
    public function __invoke() {
        $input = trim(file_get_contents(__DIR__ . '/../../input/day_9.txt'));

        $processor = new StreamProcessor();

        echo 'Total count is: ' . $processor->score($input) . PHP_EOL;
    }
}
