<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;

/**
 * Link
 *
 * A single link between to points
 */
class Link extends AbstractLink implements LinkInterface
{
    /**
     * the transformer
     *
     * @var TransformerInterface
     */
    private $transformer;

    /**
     * Constructor
     *
     * @param string $from
     * @param string $to
     *
     * @param TransformerInterface $transformer optional transformer
     */
    public function __construct($from, $to, TransformerInterface $transformer = null)
    {
        parent::__construct($from, $to);

        if ($transformer instanceof TransformerInterface) {
            $this->setTransformer($transformer);
        }
    }

    /**
     * Is there a transformer?
     *
     * @return bool
     */
    public function hasTransformer()
    {
        return $this->transformer instanceof TransformerInterface;
    }

    /**
     * Get the transformer
     *
     * @return TransformerInterface
     */
    public function getTransformer()
    {
        return $this->transformer;
    }

    /**
     * Set the transformer
     *
     * @param  TransformerInterface   $transformer
     * @return self
     */
    public function setTransformer(TransformerInterface $transformer)
    {
        $this->transformer = $transformer;

        return $this;
    }
}

