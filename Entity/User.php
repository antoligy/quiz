<?php

namespace Entity;

/**
 * Entity representation of a User.
 *
 * @package Entity
 */
class User implements EntityInterface
{
    /**
     * User ID.
     *
     * @var int
     */
    private $id;

    /**
     * Construct from DB row.
     *
     * @param array $row
     *
     * @return void
     */
    public function __construct(array $row)
    {
        $this->id = $row[0];

        // Should come in through DI, not be instantiated here, but constraints.
        $this->documentRepository = new DocumentRepository;
    }

    /**
     * Returns the ID of a given user.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
