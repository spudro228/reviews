<?php

declare(strict_types=1);


namespace App\App\Query;

use JetBrains\PhpStorm\Internal\TentativeType;

class GetReviewsQueryResult implements \JsonSerializable
{

    public function __construct(
        public readonly float $stars,
        public readonly string $comment,
    )
    {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'stars' => $this->stars,
            'comment' => $this->comment,
        ];
    }
}
