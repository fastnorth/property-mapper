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
     * @var string
     */
    private $to;

    /**
     * @var mixed
     */
    private $default;

    /**
     * Constructor
     *
     * @param string $from
     * @param string $to
     * @param mixed  $default
     */
    public function __construct($from, $to, $default = null)
    {
        $this
            ->setFrom($from)
            ->setTo($to)
            ->setDefault($default);
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
     * @param  string $from
     *
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
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the to endpoint
     *
     * @param string $to
     *
     * @return self
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get the default value if no link was found
     *
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set the default value
     *
     * @param    $default
     *
     * @return self
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }
}
