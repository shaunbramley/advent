<?php

namespace Advent\Day16;

class Puzzle2
{
    public function __invoke() {
        $input = trim(file_get_contents(__DIR__ . '/../../input/day_16.txt'));

        $moves = explode(',', $input);
        $stop = 1000000000;

        $iterations = [];
        $dance = new Dance(range('a', 'p'));

        do {
            $iterations[] = $dance->getOrder();
            foreach ($moves as $move) {
                $dance->move($move);
            }

        } while ($dance->getOrder() !== 'abcdefghijklmnop');

        echo 'Iterations count: ' . count($iterations) . PHP_EOL;
        echo 'The answer should lie at: ' . $stop % count($iterations) . PHP_EOL;
        echo 'The final order of dancers is: ' . $iterations[$stop % count($iterations)] . PHP_EOL;
    }
}
