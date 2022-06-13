<?php

declare(strict_types=1);


namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class StarsQuantity
{
    #[ORM\Column(type: "float")]
    public readonly float $starts;

    public function __construct(
         float $starts
    )
    {
        $this->starts = $starts;
    }
}
