<?php

namespace spec\Advent\Day2;

use Advent\Day2\Puzzle1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Puzzle1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Puzzle1::class);
    }
}
