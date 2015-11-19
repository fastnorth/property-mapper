<?php

namespace FastNorth\PropertyMapper\Transformer;

/**
 * TransformerInterface
 *
 * Transformer for property values
 */
interface TransformerInterface
{
    public function forward($value, $context);

    public function reverse($value, $context);
}
