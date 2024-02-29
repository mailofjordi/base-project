<?php

declare(strict_types=1);

namespace App\About\Infrastructure\Persistence\Doctrine;

use App\Shared\Domain\Uuid;
use App\Shared\Infrastructure\Persistence\Doctrine\UuidType;

class AuthorIdType extends UuidType
{
    protected function getPhpValueFromString(string $value): Uuid
    {
        return new AuthorId($value);
    }

    protected function getTypeName(): string
    {
        return 'author_id';
    }
}
