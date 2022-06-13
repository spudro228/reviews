<?php

declare(strict_types=1);


namespace App\App\Command;

class AddNewReviewCommand
{

    public function __construct(
        public readonly float   $stars,
        public readonly ?string $comment = null
    )
    {
    }
}
