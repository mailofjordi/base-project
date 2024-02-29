<?php

declare(strict_types=1);

namespace App\About\Application\AddAuthor;

use App\About\Domain\Author;
use App\About\Domain\AuthorRepository;
use App\About\Infrastructure\Persistence\Doctrine\AuthorId;
use App\Shared\Domain\Bus\Handler;

readonly class AddAuthorHandler implements Handler
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }

    public function __invoke(AddAuthor $command): void
    {
        $author = new Author(new AuthorId($command->authorId()), $command->name());
        $this->authorRepository->save($author);
    }
}
