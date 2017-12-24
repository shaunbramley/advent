<?php

namespace Advent\Day16;

class Puzzle1
{
    public function __invoke() {
        $input = trim(file_get_contents(__DIR__ . '/../../input/day_16.txt'));

        $moves = explode(',', $input);

        $dance = new Dance(range('a', 'p'));

        foreach ($moves as $move) {
            $dance->move($move);
        }

        echo 'The final order of dancers is: ' . $dance->getOrder() . PHP_EOL;
    }
}
