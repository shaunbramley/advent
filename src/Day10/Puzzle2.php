<?php

namespace Advent\Day10;

class Puzzle2
{
    public function __invoke()
    {
        $input = trim(file_get_contents(__DIR__ . '/../../input/day_10.txt'));

        $hash = new Hash();

        echo 'The hash is: ' . $hash(new Knot(), $input) . PHP_EOL;
    }
}
