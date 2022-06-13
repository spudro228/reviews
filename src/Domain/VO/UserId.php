<?php

declare(strict_types=1);


namespace App\Domain\VO;

class UserId
{

    public function __construct(public readonly int $userId)
    {
    }
}
