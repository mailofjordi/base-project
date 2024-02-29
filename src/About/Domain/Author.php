<?php

declare(strict_types=1);

namespace App\About\Domain;

use App\About\Infrastructure\Persistence\Doctrine\AuthorId;

final readonly class Author
{
    public function __construct(
        public AuthorId   $id,
        public string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
