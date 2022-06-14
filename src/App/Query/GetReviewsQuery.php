<?php

declare(strict_types=1);


namespace App\App\Query;

class GetReviewsQuery
{
    public function __construct(public readonly int $productId)
    {
    }
}
