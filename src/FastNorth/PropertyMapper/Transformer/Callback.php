<?php

namespace FastNorth\PropertyMapper\Transformer;

/**
 * Callback.
 *
 * Callback transformer
 */
class Callback implements TransformerInterface
{
    /**
     * Transforming method.
     *
     * @param callable
     */
    private $transform;

    /**
     * Reversing method.
     *
     * @param callable
     */
    private $reverse;

    /**
     * Constructor.
     *
     * @param callable $transform
     * @param callable $reverse
     */
    public function __construct(callable $transform, callable $reverse)
    {
        $this->transform = $transform;
        $this->reverse   = $reverse;
    }

    /**
     * {@inheritdoc}
     */
    public function forward($value, $context)
    {
        return call_user_method_array($this->transform, [$value, $context]);
    }

    /**
     * {@inheritdoc}
     */
    public function reverse($value, $context)
    {
        return call_user_method_array($this->reverse, [$value, $context]);
    }
}
