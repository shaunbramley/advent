<?php

namespace spec\Advent\Day9;

use Advent\Day9\StreamProcessor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StreamProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(StreamProcessor::class);
    }

    function it_can_find_scores_of_test_data() {
        $this->score('{}')->shouldReturn(1);
        $this->score('{{{}}}')->shouldReturn(6);
        $this->score('{{},{}}')->shouldReturn(5);
        $this->score('{{{},{},{{}}}}')->shouldReturn(16);
        $this->score('{<a>,<a>,<a>,<a>}')->shouldReturn(1);
        $this->score('{{<ab>},{<ab>},{<ab>},{<ab>}}')->shouldReturn(9);
        $this->score('{{<!!>},{<!!>},{<!!>},{<!!>}}')->shouldReturn(9);
        $this->score('{{<a!>},{<a!>},{<a!>},{<ab>}}')->shouldReturn(3);
    }

    function it_can_count_garbage_removed() {
        $this->garbage('<>')->shouldReturn(0);
        $this->garbage('<random characters>')->shouldReturn(17);
        $this->garbage('<<<<>')->shouldReturn(3);
        $this->garbage('<{!>}>')->shouldReturn(2);
        $this->garbage('<!!>')->shouldReturn(0);
        $this->garbage('<!!!>>')->shouldReturn(0);
        $this->garbage('<{o"i!a,<{i<a>')->shouldReturn(10);

    }
}
