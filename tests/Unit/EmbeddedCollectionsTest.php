<?php

namespace FastNorth\PropertyMapper\Tests\Unit;

use FastNorth\PropertyMapper\Tests\Stubs;
use FastNorth\PropertyMapper\Tests\TestCase;
use FastNorth\PropertyMapper\Map;
use FastNorth\PropertyMapper\Factory\CallbackFactory;
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

        $map = new Map;
        $map->map('foo', 'mappedFoo')
            ->embedCollection(
                'children',
                'mappedChildren',
                (new Map)->map('foo', 'mappedFoo'),
                new CallbackFactory(
                    function($value) {
                        return new Stubs\To;
                    },
                    function($value) {
                        return [];
                    }
                )
            );

        $mapper = new Mapper;

        $mapper->process($from, $to, $map);

        $this->assertCount(3, $to->getMappedChildren());
        $count = 0;
        foreach($to->getMappedChildren() as $child) {
            $this->assertInstanceOf(Stubs\To::class, $child);
            $this->assertEquals(sprintf('foo child %d', $count++), $child->getMappedFoo());
        }
    }

    /** @test */
    public function itReversesEmbeddedCollections()
    {
        $from = new Stubs\From();
        $to = new Stubs\To('value from mapped foo');
        $to->setMappedChildren([
            new Stubs\From('foo child 0'),
            new Stubs\From('foo child 1'),
            new Stubs\From('foo child 2')
        ]);

        $map = new Map;
        $map->map('foo', 'mappedFoo')
            ->embedCollection(
                'children',
                'mappedChildren',
                (new Map)->map('[foo]', 'foo'), // Maps from array to property
                new CallbackFactory(
                    function($value) {
                        return new Stubs\To;
                    },
                    function($value) {
                        return [];
                    }
                )
            );

        $mapper = new Mapper;

        $mapper->reverse($from, $to, $map);

        $this->assertEquals('value from mapped foo', $from->getFoo());

        $this->assertCount(3, $from->getChildren());
        $count = 0;
        foreach($from->getChildren() as $child) {
            $this->assertTrue(is_array($child));
            $this->assertEquals(sprintf('foo child %d', $count++), $child['foo']);
        }
    }
}
