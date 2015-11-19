<?php

namespace FastNorth\PropertyMapper;

use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;

/**
 * Mapper.
 *
 * Maps properties
 */
class Mapper implements MapperInterface
{
    /**
     * Property accessor.
     *
     * @var PropertyAccessorInterface
     */
    private $propertyAccess;

    /**
     * Constructor.
     *
     * When not given a PropertyAccessor, a new one will be instantiated.
     *
     * @param PropertyAccessorInterface $propertyAccess optional property accessor
     */
    public function __construct(PropertyAccessorInterface $propertyAccess = null)
    {
        if (!($propertyAccess instanceof PropertyAccessorInterface)) {
            $propertyAccess = new PropertyAccessor();
        }
        $this->propertyAccess = $propertyAccess;
    }

    /**
     * {@inheritdoc}
     */
    public function process($from, &$to, MapInterface $map)
    {
        $this->processLinks($from, $to, $map);

        return $to;
    }

    /**
     * {@inheritdoc}
     */
    public function reverse(&$from, $to, MapInterface $map)
    {
        $this->reverseLinks($from, $to, $map);

        return $from;
    }

    /**
     * Process the property links of a map.
     *
     * @param object|array $from
     * @param object|array $to
     * @param MapInterface $map
     *
     * @return self
     */
    private function processLinks($from, &$to, MapInterface $map)
    {
        foreach ($map->getLinks() as $link) {
            if ($link->hasTransformer()) {
                $value = $link->getTransformer()->transform(
                    $this->propertyAccess->getValue($from, $link->getFrom()),
                    $from
                );
            } else {
                $value = $this->propertyAccess->getValue($from, $link->getFrom());
            }

            $this->propertyAccess->setValue($to, $link->getTo(), $value);
        }

        return $this;
    }

    /**
     * Reverse the property links of a map.
     *
     * @param object|array $from
     * @param object|array $to
     * @param MapInterface $map
     *
     * @return self
     */
    private function reverseLinks(&$from, $to, MapInterface $map)
    {
        foreach ($map->getLinks() as $link) {
            if ($link->hasTransformer()) {
                $value = $link->getTransformer()->reverse(
                    $this->propertyAccess->getValue($to, $link->getTo()),
                    $to
                );
            } else {
                $value = $this->propertyAccess->getValue($to, $link->getTo());
            }

            $this->propertyAccess->setValue($from, $link->getFrom(), $value);
        }

        return $this;
    }
}
