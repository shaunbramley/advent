<?php

namespace Advent\Day6;

class Debugger
{
    private $banks;
    private $distributionCount;
    private $previousBankState;

    public function __construct(array $banks = [])
    {
        $this->banks                = $banks;
        $this->distributionCount    = 0;
        $this->previousBankState    = [];

        $this->previousBankState[]  = $this->getBanksSizeAsString();
    }

    public function getLargestMemoryBankPointer()
    {
        return array_keys($this->banks, max($this->banks))[0];
    }

    public function reallocate()
    {
        if (!$this->hasCurrentStateBeenSeenBefore()) {
            /*
             * 1. obtain value from the largest memory bank
             * 2. clear said memory bank
             * 3. increment values walking (repeatedly) around the array
             */
            $memory     = $this->getMemoryBank($this->getLargestMemoryBankPointer())->getNumberOfBlocks();
            $pointer    = $this->getLargestMemoryBankPointer();

            $this->distributionCount++;

            // clear the memory bank
            $this->getMemoryBank($this->getLargestMemoryBankPointer())->clear();

            // perform the reallocation.
            do {
                $this->banks[(++$pointer % count($this->banks))]->addBlock(1);

            } while (--$memory > 0);

            $this->previousBankState[]  = $this->getBanksSizeAsString();
        }

    }

    public function getBanksSizeAsString() : string
    {
        $string = '';
        foreach ($this->banks as $bank) {
            $string .= $bank->getNumberOfBlocks() . ' ';
        }
        return trim($string);
    }

    public function getMemoryBank(int $pointer) : MemoryBank
    {
        return $this->banks[$pointer];
    }

    public function hasCurrentStateBeenSeenBefore() : bool {
        // determine uniqueness of the array of previous states.
        return !(count(array_unique($this->previousBankState)) === count($this->previousBankState));
    }

    public function getDistributionCount() : int {
        return $this->distributionCount;
    }

    public function getNumberOfCyclesWithinInfiniteLoop() : int
    {
        /*
         * return the difference of:
         * $a - index of last entry within $this->previousBankState
         * $b - index of initial entry of value at $this->previousBankState[$a]
         */
        $sizeOfPreviousBankState = count($this->previousBankState);
        $b = array_search($this->previousBankState[$sizeOfPreviousBankState - 1], $this->previousBankState, true);


        return $sizeOfPreviousBankState - 1 - $b;
    }
}
