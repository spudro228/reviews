<?php

declare(strict_types=1);

namespace App\DTO;

use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]
class Example
{
    /** The id of this book. */
    private ?int $id = null;

    public string $name = '';
}
