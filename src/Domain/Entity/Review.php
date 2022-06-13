<?php

declare(strict_types=1);


namespace App\Domain\Entity;

use App\Domain\VO\StarsQuantity;
use App\Domain\VO\UserId;

class Review
{
    #[\ApiPlatform\Core\Annotation\ApiProperty(identifier: true)]
    public ?int $id = null;

    public function __construct(
        string        $comment,
        StarsQuantity $startQ,
        ?UserId       $userId = null,
    )
    {
    }


    public function makeReviewFromUser(
        string        $comment,
        StarsQuantity $startQ,
        ?UserId       $userId,
    ): self
    {
        return new self(
            $comment,
            $startQ,
            $userId
        );
    }

    public function makeAnonymousReview(
        string        $comment,
        StarsQuantity $startQ,
    ): self
    {

        return new self (
            $comment,
            $startQ,
        );
    }
}
