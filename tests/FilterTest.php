<?php

namespace Realodix\Collection\Test;

use PHPUnit\Framework\TestCase;
use Realodix\Collection\Collection;

class FilterTest extends TestCase
{
    public function testFilter()
    {
        $c = new Collection([['id' => 1, 'name' => 'Hello'], ['id' => 2, 'name' => 'World']]);
        $this->assertEquals([1 => ['id' => 2, 'name' => 'World']], $c->filter(function ($item) {
            return $item['id'] == 2;
        })->all());

        $c = new Collection(['', 'Hello', '', 'World']);
        $this->assertEquals(['Hello', 'World'], $c->filter()->values()->toArray());

        $c = new Collection(['id' => 1, 'first' => 'Hello', 'second' => 'World']);
        $this->assertEquals(['first' => 'Hello', 'second' => 'World'], $c->filter(function ($item, $key) {
            return $key !== 'id';
        })->all());

        $c = new Collection([1, 2, 3, null, false, '', 0, []]);
        $this->assertEquals([1, 2, 3], $c->filter()->all());
    }
}
