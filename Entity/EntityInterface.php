<?php

namespace Entity;

/**
 * Entity Interface.
 *
 * @package EntityInterface
 */
interface EntityInterface
{
    /**
     * Table name.
     *
     * @var string
     */
    public const TABLE;

    /**
     * Create Entity from DB row.
     * @param array $row DB result.
     */
    public function __construct(array $row)
    {
    }
}
