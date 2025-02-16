<?php

declare(strict_types=1);

namespace Fp\Reflection;

use Fp\Functional\Either\Either;
use ReflectionClass;
use ReflectionException;

/**
 * Returns class reflection or Left on exception
 *
 * REPL:
 * >>> getReflectionClass(Foo::class);
 * => Either<ReflectionException, ReflectionClass>
 *
 *
 * @template T of object
 *
 * @psalm-param T|class-string<T> $objectOrClass
 *
 * @psalm-return Either<ReflectionException, ReflectionClass>
 */
function getReflectionClass(object|string $objectOrClass): Either
{
    return Either::try(fn() => new ReflectionClass($objectOrClass));
}
