<?php

declare(strict_types=1);

namespace App\About\Application\GetAuthors;

use App\About\Domain\AuthorRepository;
use App\Shared\Domain\Bus\Handler;

final readonly class GetAuthorsHandler implements Handler
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }
    public function __invoke(GetAuthors $query): GetAuthorsResponse
    {
        $authors = $this->authorRepository->findAll();

        $authorsData = [];
        foreach ($authors as $author) {
            $authorsData[] = [
                "name" => $author->getName(),
            ];
        }

        return new GetAuthorsResponse($authorsData);
    }
}
