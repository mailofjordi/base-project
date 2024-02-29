<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\PhpStan;

use PHPStan\Reflection\PropertyReflection;
use PHPStan\Rules\Properties\ReadWritePropertiesExtension;
use Symfony\Component\Messenger\HandleTrait;

class SymfonyMessengerHandler implements ReadWritePropertiesExtension
{
    public function isAlwaysRead(PropertyReflection $property, string $propertyName): bool
    {
        if ($property->getDeclaringClass()->hasTraitUse(HandleTrait::class)
            && $propertyName === 'messageBus') {
            return true;
        }

        return false;
    }

    public function isAlwaysWritten(PropertyReflection $property, string $propertyName): bool
    {
        return false;
    }

    public function isInitialized(PropertyReflection $property, string $propertyName): bool
    {
        return false;
    }
}
