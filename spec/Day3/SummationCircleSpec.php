<?php

namespace spec\Advent\Day3;

use Advent\Day3\SummationCircle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SummationCircleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SummationCircle::class);
    }
}
