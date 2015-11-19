<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\Transfomer\TransformerInterface;

/**
 * LinkInterface
 *
 * Interface describing a single link
 */
interface LinkInterface
{
    /**
     * Get the "from" end point
     *
     * @return string
     */
    public function getFrom();

    /**
     * Get the "to" endpoint
     *
     * @return string
     */
    public function getTo();

    /**
     * Is there a transformer?
     *
     * @return bool
     */
    public function hasTransformer();

    /**
     * Get the transformer
     *
     * @see hasTransformer()
     *
     * @return TransformerInterface
     */
    public function getTransformer();
}
