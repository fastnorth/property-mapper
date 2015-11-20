<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\Transfomer\TransformerInterface;

/**
 * LinkInterface
 *
 * Interface describing a single link
 */
interface LinkInterface extends LinkedInterface
{
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
