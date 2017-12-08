<?php

namespace Advent\Day8;

class Puzzle1
{
    public function __invoke()
    {
        $input = $input = file(__DIR__ . '/../../input/day_8.txt');

        $cpu = new Cpu();

        foreach ($input as $instruction) {
            echo 'Instruction: ' . $instruction . PHP_EOL;
            $cpu->process(new Instruction(trim($instruction)));
        }

        echo 'The largest register has a value of: ' . $cpu->getLargestValueInAnyRegister() . PHP_EOL;
    }
}
