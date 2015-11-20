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
}
