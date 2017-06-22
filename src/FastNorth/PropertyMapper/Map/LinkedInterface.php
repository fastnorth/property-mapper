<?php

namespace FastNorth\PropertyMapper\Map;

/**
 * LinkedInterface
 *
 * From/To linked
 */
interface LinkedInterface
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
     * Get the default value if no link was found
     *
     * @return mixed
     */
    public function getDefault();
}
