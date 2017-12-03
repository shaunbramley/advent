<?php

namespace Advent\Day1;

use Advent\Day1\Comparator;

class Puzzle1
{
    public function __invoke() {
        
        // Get the data
        $input = file_get_contents(__DIR__ . '/../../input/day_1.txt');
        $input = trim($input);
       
        // Convert it to an array.
        $input = str_split($input);

        $comparator = new Comparator($input, 1);
        $comparator();
        
        echo 'The summation is: ' . $comparator->getSummation() . PHP_EOL;
    }
}
