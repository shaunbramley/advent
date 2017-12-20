<?php

namespace spec\Advent\Day3;

use Advent\Day3\Circle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CircleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Circle::class);
    }

    public function it_can_find_coordinate_of_n() {
        $numbers = [
            [1, 0, 0],
            [2, 1, 0],
            [3, 1, 1],
            [4, 0, 1],
            [5, -1, 1],
            [6, -1, 0],
            [7, -1, -1],
            [8, 0, -1],
            [9, 1, -1],
            [10, 2, -1],
            [11, 2, 0],
            [12, 2, 1],
            [13, 2, 2],
            [14, 1, 2],
            [15, 0, 2],
            [16, -1, 2],
            [17, -2, 2],
            [18, -2, 1],
            [19, -2, 0],
            [20, -2, -1],
            [21, -2, -2],
            [22, -1, -2],
            [23, 0, -2],
            [24, 1, -2],
            [25, 2, -2],
        ];

        foreach ($numbers as $number) {
            $this->findCoord($number[0], $number[1], $number[2]);
        }
    }
    private function findCoord(int $number, int $x, int $y) {
        $this->findCoordinateOfNumber($number)->getX()->shouldReturn($x);
        $this->findCoordinateOfNumber($number)->getY()->shouldReturn($y);
    }
}
