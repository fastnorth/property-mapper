<?php

namespace FastNorth\PropertyMapper\Transformer\DateTime;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;
use DateTime;

/**
 * StringToDateTime
 *
 * Turns a string representation into a datetime one
 */
class StringToDateTime implements TransformerInterface
{
    /**
     * Format for the transformation
     *
     * @var string
     */
    private $format;

    /**
     * Constructor
     *
     * @param string $format output format
     */
    public function __construct($format)
    {
        $this->format = $format;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($value, $context)
    {
        return new DateTime($value);
    }

    /**
     * {@inheritdoc}
     */
    public function reverse($value, $context)
    {
        if (!($value instanceof DateTime)) {
            return null;
        }

        return $value->format($this->format);
    }
}
