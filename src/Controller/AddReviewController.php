<?php

declare(strict_types=1);

namespace App\Controller;

use App\App\Command\AddNewReviewCommand;
use App\App\Command\AddNewReviewCommandHandler;
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

    #[Route(path: "/review/add", methods: ['POST'])]
    public function addReviewAction(AddNewReviewCommand $addNewReviewCommand, AddNewReviewCommandHandler $handler): JsonResponse
    {

        $handler->handle($addNewReviewCommand);

        return $this->json(['status' => 'ok']);
    }
}
