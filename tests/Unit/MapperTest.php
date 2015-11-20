<?php

namespace FastNorth\PropertyMapper\Tests\Unit;

use FastNorth\PropertyMapper\Tests\Stubs;
use FastNorth\PropertyMapper\Tests\TestCase;
use FastNorth\PropertyMapper\Map;
use FastNorth\PropertyMapper\Mapper;

class MapperTest extends TestCase
{
    /** @test */
    public function itMapsPropertiesOnObjects()
    {
        $map = new Map;
        $map
            ->map('leftA', 'rightA')
            ->map('leftB', 'rightB')
            ->map('leftC', 'rightC');

        $from = (object) [
            'leftA' => 'value for a',
            'leftB' => 'value for b',
            'leftC' => 'value for c',
        ];

        $to = (object) [
            'rightA' => null,
            'rightB' => null,
            'rightC' => null,
        ];

        $mapper = new Mapper;

        $mapper->process($from, $to, $map);

        $this->assertEquals('value for a', $to->rightA);
        $this->assertEquals('value for b', $to->rightB);
        $this->assertEquals('value for c', $to->rightC);
    }

    /** @test */
    public function itMapsPropertiesOnArrays()
    {
        $map = new Map;
        $map
            ->map('[leftA]', '[rightA]')
            ->map('[leftB]', '[rightB]')
            ->map('[leftC]', '[rightC]');

        $from = [
            'leftA' => 'value for a',
            'leftB' => 'value for b',
            'leftC' => 'value for c',
        ];

        $to = [];

        $mapper = new Mapper;

        $mapper->process($from, $to, $map);

        $this->assertEquals('value for a', $to['rightA']);
        $this->assertEquals('value for b', $to['rightB']);
        $this->assertEquals('value for c', $to['rightC']);
    }

    /** @test */
    public function itReversesPropertiesOnObjects()
    {
        $map = new Map;
        $map
            ->map('leftA', 'rightA')
            ->map('leftB', 'rightB')
            ->map('leftC', 'rightC');

        $from = (object) [
            'leftA' => null,
            'leftB' => null,
            'leftC' => null,
        ];

        $to = (object) [
            'rightA' => 'value for a',
            'rightB' => 'value for b',
            'rightC' => 'value for c',
        ];

        $mapper = new Mapper;

        $mapper->reverse($from, $to, $map);

        $this->assertEquals('value for a', $from->leftA);
        $this->assertEquals('value for b', $from->leftB);
        $this->assertEquals('value for c', $from->leftC);
    }

    /** @test */
    public function itMapsPropertiesUsingGettersAndSetters()
    {
        $map = new Map;
        $map->map('foo', 'mappedFoo');

        $from = new Stubs\From('value for foo');
        $to = new Stubs\To;

        $mapper = new Mapper;
        $mapper->process($from, $to, $map);

        $this->assertEquals('value for foo', $to->getMappedFoo());
    }
}

