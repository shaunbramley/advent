<?php

namespace spec\Advent\Day8;

use Advent\Day8\Instruction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstructionSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith('b inc 5 if a > 1');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Instruction::class);
    }

    function it_can_locate_the_comparison() {
        $this->getComparison()->shouldReturn('a > 1');
    }

    function it_can_locate_the_action() {
        $this->getAction()->shouldReturn('b inc 5');
    }

    function it_can_locate_the_action_operands() {
        $this->getActionOperands()->shouldHaveKeyWithValue(0, 'b');
        $this->getActionOperands()->shouldHaveKeyWithValue(1, 5);
        $this->getActionOperands()->shouldReturn(['b', 5]);
    }

    function it_can_locate_the_action_operator() {
        $this->getActionOperator()->shouldReturn('inc');
    }

    function it_can_locate_the_comparison_operands() {
        $this->getComparisonOperands()->shouldHaveKeyWithValue(0, 'a');
        $this->getComparisonOperands()->shouldHaveKeyWithValue(1, 1);
        $this->getComparisonOperands()->shouldReturn(['a', 1]);
    }

    function it_can_locate_the_comparison_operator() {
        $this->getComparisonOperator()->shouldReturn('>');
    }
}
