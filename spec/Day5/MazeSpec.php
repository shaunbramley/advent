<?php

namespace spec\Advent\Day5;

use Advent\Day5\Maze;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MazeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Maze::class);
    }
    
    function it_can_correctly_state_initial_conditions() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->getNumberOfInstructions()->shouldReturn(5);
        $this->getNumberOfJumpsTaken()->shouldReturn(0);
        $this->getIndexPointer()->shouldReturn(0);
    }
    
    function it_can_correctly_jump_to_next_instruction() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->getNumberOfJumpsTaken()->shouldReturn(1);
    }
    
    function it_can_correctly_increment_jumps_from_last_instruction() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->getNumberOfJumpsTaken()->shouldReturn(1);
        $this->getInstructions()->shouldReturn([1, 3, 0, 1, -3]);
    }
    
    function it_completes_step_one() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->getIndexPointer()->shouldReturn(0);
        $this->getNumberOfJumpsTaken()->shouldReturn(1);
        $this->getInstructions()->shouldReturn([1, 3, 0, 1, -3]);
        $this->getHasFinishedPuzzle()->shouldReturn(false);
    }
    
    function it_completes_step_two() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->jump();
        $this->getIndexPointer()->shouldReturn(1);
        $this->getNumberOfJumpsTaken()->shouldReturn(2);
        $this->getInstructions()->shouldReturn([2, 3, 0, 1, -3]);
        $this->getHasFinishedPuzzle()->shouldReturn(false);
    }
    
    function it_completes_step_three() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->jump();
        $this->jump();
        $this->getIndexPointer()->shouldReturn(4);
        $this->getNumberOfJumpsTaken()->shouldReturn(3);
        $this->getInstructions()->shouldReturn([2, 4, 0, 1, -3]);
        $this->getHasFinishedPuzzle()->shouldReturn(false);
    }
    
    function it_completes_step_four() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->jump();
        $this->jump();
        $this->jump();
        $this->getIndexPointer()->shouldReturn(1);
        $this->getNumberOfJumpsTaken()->shouldReturn(4);
        $this->getInstructions()->shouldReturn([2, 4, 0, 1, -2]);
        $this->getHasFinishedPuzzle()->shouldReturn(false);
    }
    
    function it_completes_step_five() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->jump();
        $this->jump();
        $this->jump();
        $this->jump();
        $this->jump();
        
        $this->getIndexPointer()->shouldReturn(5);
        $this->getNumberOfJumpsTaken()->shouldReturn(5);
        $this->getInstructions()->shouldReturn([2, 5, 0, 1, -2]);
        $this->getHasFinishedPuzzle()->shouldReturn(true);
    }
    
    function it_can_solve_the_puzzle() {
        $this->beConstructedWith([0, 3, 0, 1, -3]);
        $this->solve();
        
        $this->getIndexPointer()->shouldReturn(5);
        $this->getNumberOfJumpsTaken()->shouldReturn(5);
        $this->getInstructions()->shouldReturn([2, 5, 0, 1, -2]);
        $this->getHasFinishedPuzzle()->shouldReturn(true);
    }
    
    function it_can_handle_different_offsets() {
        $this->beConstructedWith(
            [0, 3, 0, 1, -3], 
            [
                ['<', 3, 1],
                ['>', 2, -1],
            ]
        );
        $this->jump();
        $this->getInstructions()->shouldReturn([1, 3, 0, 1, -3]);

        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 0, 1, -3]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 2, 0, 1, -3]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 2, 0, 1, -2]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 0, 1, -2]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 0, 2, -2]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 0, 2, -1]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 1, 2, -1]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 2, 2, -1]);
        $this->jump();
        $this->getInstructions()->shouldReturn([2, 3, 2, 3, -1]);

        $this->getNumberOfJumpsTaken()->shouldReturn(10);

    }
}
