<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;

/**
 * Link
 *
 * A single link between to points
 */
class Link implements LinkInterface
{
    /**
     * The from endpoint
     *
     * @var string
     */
    private $from;

    /**
     * The to endpoint
     *
     * @var to
     */
    private $to;

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
        $this
            ->setFrom($from)
            ->setTo($to);

        if ($transformer instanceof TransformerInterface) {
            $this->setTransformer($transformer);
        }
    }


    /**
     * Get the from endpoint
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the from endpoint
     *
     * @param  string   $from
     * @return self
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get the to endpoint
     *
     * @return to
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the to endpoint
     *
     * @param  to   $to
     * @return self
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
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

