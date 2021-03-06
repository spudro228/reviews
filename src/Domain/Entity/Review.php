<?php

declare(strict_types=1);


namespace App\Domain\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "reviews")]
class Review
{
    #[ApiProperty(identifier: true)]
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: "string")]
    private string $comment;

    #[ORM\Embedded(class: StarsQuantity::class, columnPrefix: false)]
    private StarsQuantity $startQ;
//
    #[ORM\Embedded(class: UserId::class, columnPrefix: false,)]
    private ?UserId $userId;

    public function __construct(
        string        $comment,
        StarsQuantity $startQ,
        ?UserId       $userId = null,
    )
    {
        $this->comment = $comment;
        $this->startQ = $startQ;
        $this->userId = $userId;
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

    public function getStars(): float
    {
        return $this->startQ->starts;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}
