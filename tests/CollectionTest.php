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
}
