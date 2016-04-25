<?php

use Entity/User;
use Entity/Document;
use Repository/DocumentRepository;

/**
 * Document Manager
 */
class DocumentManager
{
    /**
     * Current User.
     * @var User
     */
    private $currentUser;

    /**
     * Constructor for Document Manager.
     *
     * @param User $currentUser Current user, provided by app (firewall or controller?)
     */
    public function __construct(User $currentUser)
    {
        $this->currentUser = $currentUser;

        /**
         * @var DocumentRepository
         * @todo Move this to dependency injection for testability.
         */
        $this->documentRepository = new DocumentRepository();
    }

    /**
     * Creates a new Document.
     *
     * @param  string $name   Name of the new Document.
     *
     * @return Document
     */
    public function makeNewDocument($name)
    {
        $doc = new Document();
        $doc->setTitle($name);
        return $doc;
    }

    /**
     * Returns all Documents belonging to the current user.
     * @return Document[]
     */
    public function getMyDocuments()
    {
        return $this
            ->documentRepository
            ->getDocumentsForUser($this->currentUser);
    }
}
