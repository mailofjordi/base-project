<?php

declare(strict_types=1);

namespace App\About\Infrastructure\Persistence\Doctrine;

use App\About\Domain\Author;
use App\About\Domain\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class DoctrineAuthorRepository implements AuthorRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function findAll(): array
    {
        $repository = $this->entityManager->getRepository(Author::class);
        return $repository->findAll();
    }

    public function save(Author $author): void
    {
        $this->entityManager->persist($author);
        $this->entityManager->flush();
    }
}
