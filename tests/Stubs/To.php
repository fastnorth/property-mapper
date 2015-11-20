<?php

namespace FastNorth\PropertyMapper\Tests\Stubs;

/**
 * To
 *
 * Description...
 */
class To
{
    /**
     * mapped foo
     *
     * @var string
     */
    private $mappedFoo;

    /**
     * Get mapped foo
     *
     * @return string
     */
    public function getMappedFoo()
    {
        return $this->mappedFoo;
    }

    /**
     * Set mapped foo
     *
     * @param  string   $mappedFoo
     * @return self
     */
    public function setMappedFoo($mappedFoo)
    {
        $this->mappedFoo = $mappedFoo;

        return $this;
    }
}
