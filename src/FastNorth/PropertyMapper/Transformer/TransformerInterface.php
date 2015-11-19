<?php

namespace FastNorth\PropertyMapper\Transformer;

/**
 * TransformerInterface
 *
 * Transformer for property values
 */
interface TransformerInterface
{
    /**
     * Transform a value
     *
     * @param mixed $value
     * @param array|object $context the "from" side of the mapping
     */
    public function transform($value, $context);

    /**
     * Reverse-transform a value
     *
     * @param mixed $value
     * @param array|object $context the "to" side of the mapping
     */
    public function reverse($value, $context);
}
