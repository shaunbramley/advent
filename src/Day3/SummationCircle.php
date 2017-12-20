<?php
declare(strict_types = 1);

namespace Advent\Day3;

class SummationCircle
{
    public function __invoke(int $valueProvided) {
        $valueAtCoord = 0;
        $x = 0;
        $y = 0;
        $grid = [];
        $step = [
            'left'  => 2,
            'right' => 1,
        ];
        $direction = [
            'up'    => 0,
            'down'  => 0,
            'right' => 0,
            'left'  => 0,
        ];

        $neighbours = [
            [0, 1],
            [1, 1],
            [1, 0],
            [1, -1],
            [0, -1],
            [-1, -1],
            [-1, 0],
            [-1, 1]
        ];

        while ($valueAtCoord <= $valueProvided) {
            $valueAtCoord = 0;

            if (0 === $x && 0 === $y) {
                $valueAtCoord++;
            }

            foreach($neighbours as $index => $neighbour) {
                if (isset($grid[$x + $neighbour[0]][$y + $neighbour[1]])) {
                    $valueAtCoord += $grid[$x + $neighbour[0]][$y + $neighbour[1]];
                }
            }

            $grid[$x][$y] = $valueAtCoord;

            if ($direction['right'] < $step['right']) {
                $direction['right']++;
                $x++;
            } elseif ($direction['up'] < $step['right']) {
                $direction['up']++;
                $y++;
            } elseif ($direction['left'] < $step['left']) {
                $direction['left']++;
                $x--;
            } elseif ($direction['down'] < $step['left']) {
                $direction['down']++;
                $y--;
            } else {
                $direction['left']  = 0;
                $direction['right'] = 0;
                $direction['up']    = 0;
                $direction['down']  = 0;
                $step['left']       += 2;
                $step['right']      +=2;
            }
        }
        return $valueAtCoord;
    }
}
