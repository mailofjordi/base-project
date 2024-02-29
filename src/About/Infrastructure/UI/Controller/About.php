<?php

declare(strict_types=1);

namespace App\About\Infrastructure\UI\Controller;

use App\About\Application\GetAuthors\GetAuthors;
use App\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class About extends AbstractController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    #[Route('/', name: 'about')]
    public function about(): Response
    {
        $response = $this->queryBus->ask(new GetAuthors());

        return new JsonResponse(
            ['authors' => $response->getAuthors()],
            Response::HTTP_OK
        );
    }
}
