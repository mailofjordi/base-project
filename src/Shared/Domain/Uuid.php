<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use InvalidArgumentException;
use Stringable;
use Ramsey\Uuid\Uuid as RamseyUuid;

abstract readonly class Uuid implements Stringable
{
    final public function __construct(private string $value)
    {
        $this->validate($this->value);
    }

    public static function create(): static
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public function equals(Uuid $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function validate(string $value): void
    {
        if (!RamseyUuid::isValid($value)) {
            throw new InvalidArgumentException('Invalid UUID');
        }
    }
}
