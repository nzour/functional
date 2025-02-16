<?php

declare(strict_types=1);

namespace Tests\Static\Functions\Collection;

use Fp\Functional\Option\Option;
use Tests\PhpBlockTestCase;

final class ShiftTest extends PhpBlockTestCase
{
    public function testWithArray(): void
    {
        $phpBlock = /** @lang InjectablePHP */ '
            /** 
             * @psalm-return array<string, int> 
             */
            function getCollection(): array { return []; }
            
            $result = \Fp\Collection\shift(
                getCollection(),
            );
        ';

        $this->assertBlockTypes($phpBlock, strtr(
            'Option<array{int, list<int>}>',
            [
                'Option' => Option::class,
            ]
        ));
    }
}
