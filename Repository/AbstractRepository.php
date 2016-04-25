<?php

namespace Repository;

use Entity/EntityInterface;

/**
 * Abstract Repository.
 *
 * @package Repository
 */
abstract class AbstractRepository
{

    /**
     * Entity to be persisted.
     *
     * @var EntityInterface[]
     */
    private $toBePersisted = array();

    /**
     * Persists an entity.
     *
     * @param  EntityInterface $entity
     *
     * @return void
     */
    public function persist(EntityInterface $entity)
    {
        $this->toBePersisted[] = $entity;
    }

    /**
     * Flushes current Entities.
     *
     * @return void
     */
    public function flush()
    {
    }
}
