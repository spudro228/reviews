<?php

declare(strict_types=1);


namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class UserId
{

    public function __construct(
        #[ORM\Column(type: "integer", nullable: true)] public readonly int $userId
    )
    {
    }
}
