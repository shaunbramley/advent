<?php
declare(strict_types = 1);

namespace Advent\Day3;

class Puzzle2
{
    public function __invoke()
    {
        $value = (int) trim(file_get_contents(__DIR__ . '/../../input/day_3.txt'));

        // Puzzle solution provided at https://oeis.org/A141481
//        $url        = 'https://oeis.org/A141481/b141481.txt';
//        $file       = file($url);
//
//        foreach ($file as $index => $line) {
//            if ($index > 1) {
//                $search = explode(' ', $line)[1];
//
//                if ($search > $value) {
//                    break;
//                }
//            }
//        }
//
//        echo PHP_EOL . 'First value based upon solution at ' . $url . ' is: ' . $search . PHP_EOL;

        $circle = new SummationCircle();
        $search = $circle($value);

        echo PHP_EOL . 'First value based on my solution is: ' . $search . PHP_EOL;
    }
}
