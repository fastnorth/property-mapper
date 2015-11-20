<?php

namespace FastNorth\PropertyMapper\Tests\Unit;

use FastNorth\PropertyMapper\Tests\Stubs;
use FastNorth\PropertyMapper\Tests\TestCase;
use FastNorth\PropertyMapper\Map;
use FastNorth\PropertyMapper\Factory\CallbackFactory;
use FastNorth\PropertyMapper\Mapper;

/**
 * EmbedTest
 *
 * Tests embeds
 */
class EmbedTest extends TestCase
{
    /** @test */
    public function itMapsEmbeds()
    {
        $from = ['foo' => 'value for foo'];
        $to = new Stubs\Embed;

        $embedMap = (new Map)->map('[foo]', 'mappedFoo');
        $map = (new Map)->embed('embedded', $embedMap, new CallbackFactory(function() {
            return new Stubs\To;
        }));

        (new Mapper)->process($from, $to, $map);

        $this->assertInstanceOf(Stubs\To::class, $to->getEmbedded());
        $this->assertEquals('value for foo', $to->getEmbedded()->getMappedFoo());
    }

    /** @test */
    public function itReversesEmbeds()
    {
        $from = ['foo' => null];
        $to = new Stubs\Embed;
        $to->setEmbedded(new Stubs\To('value from mapped foo'));

        (new Mapper)->reverse(
            $from,
            $to,
            (new Map)->embed(
                'embedded',
                (new Map)->map('[foo]', 'mappedFoo'),
                new CallbackFactory(function() {
                    return new Stubs\To;
                })
            )
        );

        $this->assertEquals('value from mapped foo', $from['foo']);
    }
}

