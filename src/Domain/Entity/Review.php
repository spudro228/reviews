<?php

declare(strict_types=1);


namespace App\Domain\Entity;

use App\Domain\VO\StarsQuantity;
use App\Domain\VO\UserId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "reviews")]
class Review
{
    #[\ApiPlatform\Core\Annotation\ApiProperty(identifier: true)]
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: "string")]
    private string $comment;

//    #[ORM\Embedded(class: StarsQuantity::class, columnPrefix: false)]
//    private StarsQuantity $startQ;
//
//    #[ORM\Embedded(class: UserId::class, columnPrefix: false)]
//    private ?UserId $userId;

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
}
