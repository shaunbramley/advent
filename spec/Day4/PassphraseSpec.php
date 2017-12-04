<?php

namespace spec\Advent\Day4;

use Advent\Day4\Passphrase;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PassphraseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Passphrase::class);
    }
    
    function it_validates_first_example() {
        $this->beConstructedWith('aa bb cc dd ee');
        
        $this->isValid()->shouldReturn(true);
    }
    
    function it_validates_second_example() {
        $this->beConstructedWith('aa bb cc dd aa');
        
        $this->isValid()->shouldReturn(false);
    }
    
    function it_validates_third_example() {
        $this->beConstructedWith('aa bb cc dd aaa');
        
        $this->isValid()->shouldReturn(true);
    }
    
    function it_validates_anagram_existance_of_first_example() {
        $this->beConstructedWith('abcde fghij');
        $this->hasAnagram()->shouldReturn(false);
    }
    
    function it_validates_anagram_existance_of_second_example() {
        $this->beConstructedWith('abcde xyz ecdab');
        $this->hasAnagram()->shouldReturn(true);
    }
    
    function it_validates_anagram_existance_of_third_example() {
        $this->beConstructedWith('a ab abc abd abf abj');
        $this->hasAnagram()->shouldReturn(false);
    }
    
    function it_validates_anagram_existance_of_forth_example() {
        $this->beConstructedWith('iiii oiii ooii oooi oooo');
        $this->hasAnagram()->shouldReturn(false);
    }
   
    function it_validates_anagram_existance_of_fifth_example() {
        $this->beConstructedWith('oiii ioii iioi iiio');
        $this->hasAnagram()->shouldReturn(true);
    }
    
}
