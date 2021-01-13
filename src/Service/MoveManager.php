<?php

namespace App\Service;

use App\Repository\TileRepository;

class MoveManager
{
    private $tr;

    public function __construct(TileRepository $tr)
    {
        $this->tr = $tr;
    }

    public function tileExists(int $x, int $y): bool
    {
        if ($this->tr->findOneBy( [
            'coordX' => $x,
            'coordY' => $y
        ] )) {
            return true;
        } else {
            return false;
        }
    }
}