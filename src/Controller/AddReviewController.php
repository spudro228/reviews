<?php

declare(strict_types=1);


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AddReviewController extends AbstractController
{

    #[Route(path: "/hello", methods: ['GET'])]
    public function indexAction(): JsonResponse
    {
        return $this->json(['response' => "hello world"]);
    }
}
