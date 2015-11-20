<?php

namespace FastNorth\PropertyMapper\Tests\Stubs;

/**
 * From
 *
 * Description...
 */
class From
{
    /**
     * foo
     *
     * @var string
     */
    private $foo;

    /**
     * the children
     *
     * @var array
     */
    private $children = [];

    public function __construct($foo = null)
    {
        $this->foo = $foo;
    }

    /**
     * Get foo
     *
     * @return string
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * Set foo
     *
     * @param  string   $foo
     * @return self
     */
    public function setFoo($foo)
    {
        $this->foo = $foo;

        return $this;
    }

    /**
     * Get the children
     *
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set the children
     *
     * @param  array   $children
     * @return self
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }
}
