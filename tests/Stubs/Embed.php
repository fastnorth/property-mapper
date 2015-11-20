<?php

namespace FastNorth\PropertyMapper\Tests\Stubs;

/**
 * Embed
 *
 * Embeds a From
 */
class Embed
{
    /**
     * the embed
     *
     * @var To
     */
    private $embedded;

    /**
     * Get the embed
     *
     * @return To
     */
    public function getEmbedded()
    {
        return $this->embedded;
    }

    /**
     * Set the embed
     *
     * @param  To   $embedded
     * @return self
     */
    public function setEmbedded(To $embedded)
    {
        $this->embedded = $embedded;

        return $this;
    }
}

