<?php

namespace Repository;

use Entity/EntityInterface;

/**
 * Repository Interface.
 *
 * @package Repository
 */
class RepositoryInterface
{

    /**
     * Items to be persisted.
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
