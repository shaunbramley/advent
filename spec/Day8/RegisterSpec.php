<?php

namespace spec\Advent\Day8;

use Advent\Day8\Register;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Register::class);
    }

    function it_has_default_value_of_zero() {
        $this->beConstructedWith();
        $this->getValue()->shouldReturn(0);
    }

    function it_has_correct_value_after_instantiation() {
        $this->beConstructedWith(4);
        $this->getValue()->shouldReturn(4);
    }

    function it_can_decriment_correctly() {
        $this->dec(15)->getValue()->shouldReturn(-15);
    }

    function it_can_increment_correctly() {
        $this->inc(15)->getValue()->shouldReturn(15);
    }

    function it_can_inc_and_dec_correctly() {
        $this->inc(5)->dec(4)->getValue()->shouldReturn(1);
    }
}
