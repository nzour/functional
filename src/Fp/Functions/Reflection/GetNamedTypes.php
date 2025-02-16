<?php

declare(strict_types=1);

namespace Fp\Reflection;

use ReflectionNamedType;
use ReflectionProperty;
use ReflectionUnionType;

/**
 * Returns property types by property reflection
 *
 * REPL:
 * >>> $fooProp = new ReflectionProperty(Foo::class, 'a');
 * >>> getNamedTypes($fooProp);
 * => list<ReflectionNamedType>
 *
 *
 * @param ReflectionProperty $property
 *
 * @return list<ReflectionNamedType>
 */
function getNamedTypes(ReflectionProperty $property): array
{
    $type = $property->getType();

    return match (true) {
        ($type instanceof ReflectionNamedType) => [$type],
        ($type instanceof ReflectionUnionType) => $type->getTypes(),
        default => [],
    };
}
