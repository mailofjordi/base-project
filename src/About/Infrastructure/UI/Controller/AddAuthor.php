<?php

declare(strict_types=1);

namespace App\About\Infrastructure\UI\Controller;

use App\Shared\Domain\Bus\Command\CommandBus;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class AddAuthor extends AbstractController
{
    public function __construct(private readonly CommandBus $commandBus)
    {
    }

    /**
     * @throws JsonException
     */
    #[Route('/author', name: 'app_about_infrastructure_ui_add_author', methods: ['POST'], format: 'json')]
    public function about(Request $request): Response
    {
        $jsonData = $request->getContent();

        /** @var array<string, string> $data */
        $data = json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR);
        $this->commandBus->dispatch(
            new \App\About\Application\AddAuthor\AddAuthor(
                $data['id'],
                $data['name'],
            )
        );

        return new JsonResponse(null, Response::HTTP_OK);
    }
}
