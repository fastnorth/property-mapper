<?php

namespace FastNorth\PropertyMapper\Factory;

use FastNorth\PropertyMapper\FactoryInterface;

/**
 * CallbackFactory.
 *
 * factory using two callbacks for instantiation
 */
class CallbackFactory implements FactoryInterface
{
    /**
     * Factory.
     *
     * @var callable
     */
    private $factory;

    /**
     * "Reverse" factory.
     *
     * @var callable
     */
    private $reverse;

    /**
     * Constructor.
     *
     * @param callable $factory
     * @param callable $reverse
     */
    public function __construct(callable $factory, callable $reverse = null)
    {
        $this->factory = $factory;
        $this->reverse = $reverse;
    }

    /**
     * {@inheritdoc}
     */
    public function factory($context)
    {
        return call_user_func($this->factory, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function reverse($context)
    {
        return call_user_func($this->reverse, $context);
    }
}
