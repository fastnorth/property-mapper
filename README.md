# Property Mapper

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
