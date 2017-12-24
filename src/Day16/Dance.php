<?php

namespace Advent\Day16;

class Dance
{
    private $dancers;

    public function __construct(array $dancers = [])
    {
        $this->dancers = $dancers;
    }

    public function getOrder()
    {
        return implode($this->dancers);
    }

    public function spin(int $spinSize) : Dance
    {
        for ($x = 0; $x < $spinSize; $x++) {
            array_unshift($this->dancers, array_pop($this->dancers));
        }

        return $this;
    }

    public function exchange(int $position1, int $position2) : Dance
    {
        $temp = $this->dancers;

        $this->dancers[$position1] = $temp[$position2];
        $this->dancers[$position2] = $temp[$position1];

        return $this;
    }

    public function swap(string $value1, string $value2) : Dance
    {
        $key1 = array_search($value1, $this->dancers);
        $key2 = array_search($value2, $this->dancers);

        return $this->exchange($key1, $key2);
    }

    public function move (string $movement) : Dance {
        $action = substr($movement, 0, 1);
        $info = substr($movement, 1);

        switch ($action) {
            case 's':
                $this->spin($info);
                break;
            case 'x':
                [$p1, $p2] = explode('/', $info);
                $this->exchange($p1, $p2);
                break;
            case 'p':
                [$v1, $v2] = explode('/', $info);
                $this->swap($v1, $v2);
                break;
        }
        return $this;
    }
}
