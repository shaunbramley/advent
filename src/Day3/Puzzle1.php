<?php

namespace Advent\Day3;

class Puzzle1
{

    public function __invoke() {
        $circle = new Circle();

        $value = (int) trim(file_get_contents(__DIR__ . '/../../input/day_3.txt'));
        $coordinate = $circle->findCoordinateOfNumber($value);

        echo PHP_EOL . 'Distance: ' . $coordinate->getDistance(new Coordinate()) . PHP_EOL;
    }
}
