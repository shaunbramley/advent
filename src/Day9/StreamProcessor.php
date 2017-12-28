<?php

namespace Advent\Day9;

class StreamProcessor
{
    private $matchs = 0;

    public function score(string $input) : int {
        $input = $this->removeCancel($input);
        $input = $this->removeGarbage($input);

        $score = 0;
        $level = 0;

        foreach (str_split($input) as $char) {
            if ($char === '{') {
                $level++;
            }
            if ($char === '}') {
                $score += $level;
                $level--;
            }
        }

        return $score;
    }

    public function garbage(string $input) : int {
        $input = $this->removeCancel($input);

        $before = strlen($input);
        $after  = strlen($this->removeGarbage($input));

        return $before - $after - ($this->matchs * 2);
    }

    private function removeGarbage(string $input) : string {
        return preg_replace('/<.*?>/', '', $input, -1, $this->matchs);
    }



    private function removeCancel(string $input) : string {
        return preg_replace('/\!./', '', $input);
    }
}
