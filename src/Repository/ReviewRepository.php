<?php

declare(strict_types=1);


namespace App\Repository;

use App\App\Repository\ReviewRepositoryInterface;
use App\Domain\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ReviewRepository implements ReviewRepositoryInterface
{
    private EntityRepository $repository;

    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(Review::class);
    }

    public function save(Review $review): void
    {
        $this->entityManager->persist($review);
        $this->entityManager->flush();
    }

    public function findByProductId(int $productId): array
    {
        $qb = $this->repository->createQueryBuilder('r');

//        $qb
//            ->andWhere('r.productId = :productId');
//
//        $qb
//            ->setParameter('productId', $productId);

        return $qb->getQuery()->getResult();
    }
}
