<?php

declare(strict_types=1);

namespace App\About\Application\GetAuthors;

final readonly class GetAuthorsResponse
{
    /**
    * @param array<int<0, max>, array{name: string}> $authors
     */
    public function __construct(private array $authors)
    {
    }

    /**
    * @return array<int<0, max>, array{name: string}>
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }
}
