<?php

namespace FastNorth\PropertyMapper\Map;

/**
 * AbstractLink
 *
 * Abstract link
 */
class AbstractLink implements LinkedInterface
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
     * Constructor
     *
     * @param string $from
     * @param string $to
     */
    public function __construct($from, $to)
    {
        $this
            ->setFrom($from)
            ->setTo($to);
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
}

