<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Persistence\Doctrine;

use App\Shared\Domain\Uuid;
use Doctrine\DBAL\Types\StringType;

abstract class UuidType extends StringType
{
    abstract protected function getPhpValueFromString(string $value): Uuid;

    abstract protected function getTypeName(): string;

    public function getName(): string
    {
        return $this->getTypeName();
    }

    public function convertToDatabaseValue($value, $platform): ?string
    {
        /** @var Uuid|null $value */
        if ($value === null) {
            return null;
        }

        return (string) $value;

    }

    public function convertToPHPValue($value, $platform): ?Uuid
    {
        /** @var string|null $value */
        if ($value === null) {
            return null;
        }
        return $this->getPhpValueFromString($value);
    }
}
