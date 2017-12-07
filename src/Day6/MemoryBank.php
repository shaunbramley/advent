<?php

namespace Advent\Day6;

class MemoryBank
{
    private $blocks;

    public function __construct(int $blocks = 0) {
        $this->blocks = $blocks;
    }

    public function clear() {
        $this->blocks = 0;

        return $this;
    }

    public function addBlock(int $block) {
        $this->blocks += $block;

        return $this;
    }

    public function getNumberOfBlocks() : int {
        return $this->blocks;
    }
}