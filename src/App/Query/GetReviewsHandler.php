<?php

declare(strict_types=1);


namespace App\App\Query;

use App\App\Repository\ReviewRepositoryInterface;
use App\Domain\Entity\Review;

class GetReviewsHandler
{

    public function __construct(private ReviewRepositoryInterface $reviewRepository)
    {
    }

    public function handle(GetReviewsQuery $getReviewsQuery): array
    {
        $result = $this->reviewRepository->findByProductId($getReviewsQuery->productId);

        return \array_map(
            function (Review $review) {
                return new GetReviewsQueryResult(
                    $review->getStars(),
                    $review->getComment(),
                );
            },
            $result
        );
    }
}
