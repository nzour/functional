<?php

declare(strict_types=1);

namespace Fp\Cast;

use Fp\Functional\Option\Option;

/**
 * Try cast integer like value
 * Returns None if cast is not possible
 *
 * @psalm-template T
 *
 * @psalm-param T $subject
 *
 * @psalm-return Option<int>
 */
function asInt(mixed $subject): Option
{
    return Option::of(filter_var($subject, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE));
}
