<?php

namespace FastNorth\PropertyMapper;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

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
            $propertyAccess = PropertyAccess::createPropertyAccessorBuilder()
                                            ->enableExceptionOnInvalidIndex()
                                            ->disableMagicCall()
                                            ->getPropertyAccessor();
        }
        $this->propertyAccess = $propertyAccess;
    }

    /**
     * {@inheritdoc}
     */
    public function process($from, &$to, MapInterface $map)
    {
        (new Processor\Links($this->propertyAccess))->process($from, $to, $map);
        (new Processor\Embeds($this->propertyAccess))->process($from, $to, $map);
        (new Processor\EmbeddedCollections($this->propertyAccess))->process($from, $to, $map);

        return $to;
    }

    /**
     * {@inheritdoc}
     */
    public function reverse(&$from, $to, MapInterface $map)
    {
        (new Processor\Links($this->propertyAccess))->reverse($from, $to, $map);
        (new Processor\Embeds($this->propertyAccess))->reverse($from, $to, $map);
        (new Processor\EmbeddedCollections($this->propertyAccess))->reverse($from, $to, $map);

        return $from;
    }
}
