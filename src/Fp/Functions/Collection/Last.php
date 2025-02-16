<?php

declare(strict_types=1);

namespace Fp\Collection;

use Fp\Functional\Option\Option;

/**
 * Returns last collection element
 * and None if there is no last element
 *
 * REPL:
 * >>> last([1, 2, 3])->get()
 * => 3
 *
 *
 * @psalm-template TK of array-key
 * @psalm-template TV
 *
 * @psalm-param iterable<TK, TV> $collection
 * @psalm-param null|callable(TV, TK): bool $predicate
 *
 * @psalm-return Option<TV>
 */
function last(iterable $collection, ?callable $predicate = null): Option
{
    $last = null;

    foreach ($collection as $index => $element) {
        if (is_null($predicate) || call_user_func($predicate, $element, $index)) {
            $last = $element;
        }
    }

    return Option::fromNullable($last);
}
