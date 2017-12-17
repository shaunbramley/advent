<?php

namespace spec\Advent\Day15;

use Advent\Day15\Generator;
use Advent\Day15\Judge;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JudgeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Judge::class);
    }

    function it_can_find_matches_in_first_five_pairs() {
        $a = new Generator(65, 16807);
        $b = new Generator(8921, 48271);

        $this->cycles($a, $b, 5);
        $this->getNumberOfMatches()->shouldReturn(1);

    }

    function it_can_find_all_matches() {
        $a = new Generator(65, 16807);
        $b = new Generator(8921, 48271);

        $this->cycles($a, $b, 40000000);
        $this->getNumberOfMatches()->shouldReturn(588);
    }
}
