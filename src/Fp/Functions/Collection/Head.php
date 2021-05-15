<?php

declare(strict_types=1);

namespace Fp\Collection;

use Fp\Functional\Option\Option;

/**
 * Returns collection first element
 *
 * @psalm-template TK of array-key
 * @psalm-template TV
 *
 * @psalm-param iterable<TK, TV> $collection
 *
 * @psalm-return Option<TV>
 */
function head(iterable $collection): Option
{
    $head = null;

    foreach ($collection as $element) {
        $head = $element;
        break;
    }

    return Option::of($head);
}
