<?php

namespace Advent\Day9;

class Puzzle2
{
    public function __invoke() {
        $input = trim(file_get_contents(__DIR__ . '/../../input/day_9.txt'));

        $processor = new StreamProcessor();

        echo 'Total garbage removed is: ' . $processor->garbage($input) . PHP_EOL;
    }
}
