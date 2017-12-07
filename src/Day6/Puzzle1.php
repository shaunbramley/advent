<?php

namespace Advent\Day6;

class Puzzle1
{
    public function __invoke() {

        $input = file_get_contents(__DIR__ . '/../../input/day_6.txt');
        $input = trim(preg_replace("/\n/", ' ', $input));
        $input = explode("\t", $input);

        $memorybank = [];

        foreach ($input as $bank) {
            $memorybank[] = new MemoryBank($bank);
        }

        $debugger = new Debugger($memorybank);

        do {
            $debugger->reallocate();
        } while ($debugger->hasCurrentStateBeenSeenBefore() === false);

        echo 'Steps required: ' . $debugger->getDistributionCount() . PHP_EOL;
    }
}
