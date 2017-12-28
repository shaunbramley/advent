<?php

namespace spec\Advent\Day10;

use Advent\Day10\Knot;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KnotSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Knot::class);
    }

    public function it_can_arrange_list_properly() {
        $this->beConstructedWith();
        $this->__invoke(
            [0, 1, 2, 3, 4],
            [3, 4, 1, 5]
        )->shouldReturn([3, 4, 2, 1, 0]);
    }
}
