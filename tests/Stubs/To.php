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
     * the mapped children
     *
     * @var array
     */
    private $mappedChildren = '';

    /**
     * Constructor
     *
     * @param string $mappedFoo
     */
    public function __construct($mappedFoo = null)
    {
        $this->setMappedFoo($mappedFoo);
    }

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

    /**
     * Get the mapped children
     *
     * @return array
     */
    public function getMappedChildren()
    {
        return $this->mappedChildren;
    }

    /**
     * Set the mapped children
     *
     * @param  array   $mappedChildren
     * @return self
     */
    public function setMappedChildren($mappedChildren)
    {
        $this->mappedChildren = $mappedChildren;

        return $this;
    }
}
