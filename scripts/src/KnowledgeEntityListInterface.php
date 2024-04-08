<?php

declare(strict_types=1);

namespace Knowolo;

use Iterator;

/**
 * A list of knowledge entities.
 *
 * @extends \Iterator<\Knowolo\KnowledgeEntityInterface>
 *
 * @api
 */
interface KnowledgeEntityListInterface extends Iterator
{
    public function add(KnowledgeEntityInterface $entity): void;

    /**
     * @param list<\Knowolo\KnowledgeEntityInterface> $entities
     */
    public function addEntities(iterable $entities): void;

    /**
     * Returns the first matching term for the given ID.
     *
     * @param non-empty-string $id
     */
    public function getEntityById(string $id): KnowledgeEntityInterface|null;

    /**
     * Returns the first matching term for the given name.
     *
     * @param non-empty-string $name
     * @param string|null      $language Language of the name, usually 2 or 3 characters, such as en.
     *                         If its null or not set, then the implementation determines the language.
     */
    public function getEntityByName(string $name, string|null $language): KnowledgeEntityInterface|null;

    /**
     * @return array<\Knowolo\KnowledgeEntityInterface>
     */
    public function asArray(): array;

    /**
     * @return list<non-empty-string>
     */
    public function asListOfIds(): iterable;

    /**
     * @return list<non-empty-string>
     */
    public function asListOfNames(string|null $language = null): iterable;

    /**
     * @param list<\Knowolo\KnowledgeEntityInterface> $entitiesOfHigherOrder
     */
    public function addRelatedEntitiesOfHigherOrder(
        KnowledgeEntityInterface $entity,
        iterable $entitiesOfHigherOrder
    ): void;

    /**
     * Returns a list of related entities of higher order for given entity.
     */
    public function getRelatedEntitiesOfHigherOrder(KnowledgeEntityInterface $term): KnowledgeEntityListInterface;

    /**
     * @param list<\Knowolo\KnowledgeEntityInterface> $entitiesOfHigherOrder
     */
    public function addRelatedEntitiesOfLowerOrder(
        KnowledgeEntityInterface $entity,
        iterable $entitiesOfHigherOrder
    ): void;

    /**
     * Returns a list of related entities of lower order for given entity.
     */
    public function getRelatedEntitiesOfLowerOrder(KnowledgeEntityInterface $term): KnowledgeEntityListInterface;
}
