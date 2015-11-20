<?php

namespace FastNorth\PropertyMapper\Tests\Unit;

use FastNorth\PropertyMapper\Tests\Stubs;
use FastNorth\PropertyMapper\Tests\TestCase;
use FastNorth\PropertyMapper\Map;
use FastNorth\PropertyMapper\Mapper;

/**
 * EmbeddedCollectionsTest
 *
 * Description...
 */
class EmbeddedCollectionsTest extends TestCase
{
    /** @test */
    public function itMapsEmbeddedCollections()
    {
        $from = new Stubs\From('foo');
        $from->setChildren([
            new Stubs\From('foo child 0'),
            new Stubs\From('foo child 1'),
            new Stubs\From('foo child 2')
        ]);

        $to = new Stubs\To;

        $childMap = (new Map)->map('foo', 'mappedFoo');
        $map = new Map;
        $map->map('foo', 'mappedFoo')
            ->embedCollection('children', 'mappedChildren', $childMap, function($value) {
                return new Stubs\To;
            });

        $mapper = new Mapper;

        $mapper->process($from, $to, $map);

        $this->assertCount(3, $to->getMappedChildren());
        $count = 0;
        foreach($to->getMappedChildren() as $child) {
            $this->assertInstanceOf(Stubs\To::class, $child);
            $this->assertEquals(sprintf('foo child %d', $count++), $child->getMappedFoo());
        }
    }
}
