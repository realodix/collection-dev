<?php

namespace Realodix\Collection\Test;

use PHPUnit\Framework\TestCase;
use Realodix\Collection\Collection;

class CollectionTest extends TestCase
{
    public function testAll()
    {
        $c = new Collection([1, 2, 3]);

        $this->assertSame([1, 2, 3], $c->all());
    }

    public function testToArray()
    {
        $c = new Collection(['name' => 'Hello']);

        $this->assertSame(['name' => 'Hello'], $c->toArray());
    }

    public function testValues()
    {
        $c = new Collection([['id' => 1, 'name' => 'Hello'], ['id' => 2, 'name' => 'World']]);

        $this->assertEquals(
            [['id' => 2, 'name' => 'World']],
            $c->filter(fn($item) => $item['id'] == 2)->values()->all(),
        );
    }
}
