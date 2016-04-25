<?php

namespace Repository;

use Entity/Document;
use Entity/User;
use Database;
use PDO;
use Exception;

/**
 * Document Repository.
 *
 * @package Repository
 */
class DocumentRepository extends AbstractRepository implements RepositoryInterface
{
    /**
     * Database adapter.
     *
     * @todo Move to Doctrine.
     *
     * @var Database
     */
    private $db;

    /**
     * Constructor.
     *
     * @todo Move Singleton reference to Shared service via dependency injection.
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Retrieves all documents in the DB.
     *
     * @return Document[] Returns an array of Documents
     */
    public function getAllDocuments(): array
    {
        /**
         * Perform an unlimited query
         *
         * @var string
         *
         * @todo Implement limit and offset for pagination,
         *       default to 0 and a sensible value like 50
         */
        $query = sprintf("SELECT * FROM %s", Document::TABLE);

        /**
         * Iterate over results, construct Document entity from row.
         * 
         * @todo Determine if query was successful or not.
         */
        return array_map(function($result) {
            return new Document($result);
        }, $this->db->query($query));
    }

    /**
     * Returns all documents belonging to the given user.
     *
     * @param  User       $userId User Entity.
     *
     * @return Document[]         Array of Documents.
     */
    public function getDocumentsForUser(User $user): array
    {
        return array_filter($this->getAllDocuments(),
        function($document) use ($user) {
            return ($user->getId() === $document->getUserId());
        });
    }

    /**
     * Retrieve a document by its name.
     *
     * @param  string   $name  Name of the document.
     *
     * @return Document        Returns a Document.
     */
    public function getDocumentByName(string $name): Document
    {
        $query = sprintf("SELECT * FROM %s WHERE name = "%s" LIMIT 1", Document::TABLE, $name);
        $result = $this->db->query($query);
        return new Document($result);
    }
}
