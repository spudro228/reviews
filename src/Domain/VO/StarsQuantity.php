<?php

declare(strict_types=1);


namespace App\Domain\VO;

class StarsQuantity
{


    public function __construct(public int $wholePart, public int $fractionalPart)
    {
    }
}
