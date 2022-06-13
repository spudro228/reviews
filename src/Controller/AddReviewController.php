<?php

declare(strict_types=1);

namespace App\Controller;

use App\App\Command\AddNewReviewCommand;
use App\App\Command\AddNewReviewCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[AsController]
class AddReviewController extends AbstractController
{

    public function __construct(private AddNewReviewCommandHandler $handler)
    {
    }

    #[Route(path: "/hello", methods: ['GET'])]
    public function indexAction(): JsonResponse
    {
        return $this->json(['response' => "hello world"]);
    }

    #[Route(
        path: "/review/add",
        name: "review_add",
        methods: ['POST']
    )]
    public function addReviewAction(Request $request, SerializerInterface $serializer): JsonResponse
    {

        $addNewReviewCommand = $serializer->deserialize($request->getContent(), AddNewReviewCommand::class, 'json');
        $this->handler->handle($addNewReviewCommand);

        return $this->json(['status' => 'ok']);
    }
}
