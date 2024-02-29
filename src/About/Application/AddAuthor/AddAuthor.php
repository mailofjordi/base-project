<?php

declare(strict_types=1);

namespace App\About\Application\AddAuthor;

use App\Shared\Domain\Bus\Command\Command;

readonly class AddAuthor implements Command
{
    public function __construct(
        public string $authorId,
        private string $name
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function authorId(): string
    {
        return $this->authorId;
    }
}
