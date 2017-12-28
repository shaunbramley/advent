<?php

namespace Advent\Day10;

class Puzzle1
{
    public function __invoke()
    {
        $list = range(0, 255);

        $input = trim(file_get_contents(__DIR__ . '/../../input/day_10.txt'));
        $lengths = explode(',', $input);

        $hash = new Knot();

        $response = $hash($list, $lengths);
        echo 'The response is: ' . $response[0] * $response[1] . PHP_EOL;
    }
}
