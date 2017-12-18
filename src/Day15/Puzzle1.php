<?php

namespace Advent\Day15;

use Advent\Day15\Generator;
use Advent\Day15\Judge;
use spec\Advent\Day6\DebuggerSpec;

class Puzzle1
{
    public function __invoke()
    {
        $a = new Generator(699, 16807);
        $b = new Generator(124, 48271);
        $judge = new Judge();

        $judge->cycles($a, $b, 40000000);


        echo 'The largest register has a value of: ' . $judge->getNumberOfMatches() . PHP_EOL;
    }
}
