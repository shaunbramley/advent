<?php

namespace Advent\Day4;

class Passphrase
{
    private $words;
    public function __construct(string $input = '')
    {
        $this->words = explode(' ', $input);
    }

    public function isValid()
    {
        return $this->words === array_unique($this->words);
    }

    public function hasAnagram()
    {
        $return = false;

        $size = count($this->words);
        
        array_walk($this->words, 
            function($word, $key) use ($size, &$return) {
                
                for ($x = $key; $x < ($size - 1); $x++) {
                    if (count_chars($word, 1) == count_chars($this->words[$x+1], 1))
                        $return = true;
                }
        });
        
        return $return;
    }
}
