<?php

namespace spec\Advent\Day15;

use Advent\Day15\Generator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Generator::class);
    }

    function it_can_generate_first_five_values_for_a() {
        $this->beConstructedWith(65, 16807);
        $this->nextValueAsDec()->shouldReturn(1092455);
        $this->nextValueAsDec()->shouldReturn(1181022009);
        $this->nextValueAsDec()->shouldReturn(245556042);
        $this->nextValueAsDec()->shouldReturn(1744312007);
        $this->nextValueAsDec()->shouldReturn(1352636452);
    }

    function it_can_generate_first_five_values_for_b() {
        $this->beConstructedWith(8921, 48271);
        $this->nextValueAsDec()->shouldReturn(430625591);
        $this->nextValueAsDec()->shouldReturn(1233683848);
        $this->nextValueAsDec()->shouldReturn(1431495498);
        $this->nextValueAsDec()->shouldReturn(137874439);
        $this->nextValueAsDec()->shouldReturn(285222916);
    }

    function it_can_find_correct_matches_with_the_match_of_4() {
        $this->beConstructedWith(65, 16807, 4);
        $this->nextValueAsDec()->shouldReturn(1352636452);
        $this->nextValueAsDec()->shouldReturn(1992081072);
        $this->nextValueAsDec()->shouldReturn(530830436);
        $this->nextValueAsDec()->shouldReturn(1980017072);
        $this->nextValueAsDec()->shouldReturn(740335192);
    }

    function it_can_find_correct_matches_with_the_match_of_8() {
        $this->beConstructedWith(8921, 48271, 8);
        $this->nextValueAsDec()->shouldReturn(1233683848);
        $this->nextValueAsDec()->shouldReturn(862516352);
        $this->nextValueAsDec()->shouldReturn(1159784568);
        $this->nextValueAsDec()->shouldReturn(1616057672);
        $this->nextValueAsDec()->shouldReturn(412269392);
    }
}
