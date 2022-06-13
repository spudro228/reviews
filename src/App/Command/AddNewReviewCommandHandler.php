<?php

declare(strict_types=1);


namespace App\App\Command;

use App\App\Repository\ReviewRepositoryInterface;
use App\Domain\Entity\Review;
use App\Domain\Entity\StarsQuantity;

class AddNewReviewCommandHandler
{

    public function __construct(private ReviewRepositoryInterface $reviewRepository)
    {

    }

    public function handle(AddNewReviewCommand $data): void
    {

        $review = new Review(
            $data->comment,
            new StarsQuantity($data->stars)
        );

        $this->reviewRepository->save($review);
    }
}
