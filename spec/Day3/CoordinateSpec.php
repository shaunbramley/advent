<?php

namespace spec\Advent\Day3;

use Advent\Day3\Coordinate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CoordinateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Coordinate::class);
    }

    function it_should_be_at_0_0() {
        $this->getX()->shouldReturn(0);
        $this->getY()->shouldReturn(0);
    }

    function it_can_provide_difference_from_another_point() {
        $this->getDifference(new Coordinate(2, 2))->getX()->shouldReturn(2);
        $this->getDifference(new Coordinate(2, 2))->getY()->shouldReturn(2);
    }

    function it_can_provide_distance_from_another_point() {
        $this->beConstructedWith(3, 3);
        $this->getDistance(new Coordinate())->shouldReturn(6);
    }
}
