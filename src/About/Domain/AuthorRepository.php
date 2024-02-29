<?php

declare(strict_types=1);

namespace App\About\Domain;

interface AuthorRepository
{
    /**
     * @return Author[]
     */
    public function findAll(): array;

    public function save(Author $author): void;
}
