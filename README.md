# Property Mapper

[![Build Status](https://travis-ci.org/fastnorth/property-mapper.svg?branch=master)](https://travis-ci.org/fastnorth/property-mapper)
[![Code Climate](https://codeclimate.com/github/fastnorth/property-mapper/badges/gpa.svg)](https://codeclimate.com/github/fastnorth/property-mapper)

A common programming task deals with transforming data structures into one
another, for instance for instance processing data from an API, or a database,
into objects for internal usage. This library helps with creating mappers that can be:

 * Reversed
 * Written in isolation
 * Composed
 * Re-used
 * Tested

## Usage

Mapping operations are two-fold, first you define a `Map`, that defines which
properties map to which, after which you can use the `Mapper` to apply it to
two entities. This library uses [Symfony's
PropertyAccess](http://symfony.com/doc/current/components/property_access/index.html)
component internally to read and write from the given entities, so they can be
both objects and arrays. The property notation follows PropertyAccess' notation.

### Creating A Map

Creating a map is simply a matter of specifying all the properties on both
sides of the map:

```php
<?php

use FastNorth\PropertyMapper\Map;

$map = new Map;
$map
    ->map('someProperty', 'toAnotherProperty');
    ->map('yetAnotherProperty', 'toSomethingElse');
```

### Applying a map

Applying a map can be done by creating a `Mapper`, and calling `process()`:

```php
<?php

use FastNorth\PropertyMapper\Map;

// $map = ...;

$objectOne = new ClassOne;
$objectTwo = new ClassTwo;

$mapper = new Mapper;

// Applies the map, taking properties from $objectOne and applying them to $objectTwo
$mapper->process($objectOne, $objectTwo, $map);
```

The map can also be applied in reverse, using `reverse()`:

```php
<?php

// Applies the map in reverse, taking properties from $objectTwo and applying them to $objectOne
$mapper->reverse($objectOne, $objectTwo, $map);
```

## Transforming Values

Part of the mapping operations is taking a value from one side of the
operation, applying a transforming operation to it, then applying it to the
other. For instance, date/time might be stored as a string or integer timestamp
on one end, but a PHP `DateTime` object on the other. FastNorth PropertyMapper
supports this with the concept of "Transformers".

Transformers are bi-directional, meaning they can process data in both
directions, allowing the mapper to process maps in `reverse()`.

### Adding Transformers To a Map

Any transformer (implementing
`FastNorth\PropertyMapper\Transformer\TransformerInterface`) can be passed as a
third parameter to `map()`:

```php
<?php

use FastNorth\PropertyMapper\Map;
use FastNorth\PropertyMapper\Transformer\Datetime\StringToDateTime;

$map = new Map;
$map->map('aStringDateProperty', 'aDateTimeProperty', new DateTimeTransformer('Y-m-d'));
```

