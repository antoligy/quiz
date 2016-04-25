<?php

namespace Entity;

/**
 * Entity representation of a Document.
 *
 * @package Entity
 */
class Document implements EntityInterface
{
    /**
     * Table name.
     *
     * @var string
     */
    public const TABLE = "document"

    /**
     * Document Title.
     *
     * @var string
     */
    private $title;

    /**
     * User ID.
     *
     * @var int
     */
    private $userId;

    /**
     * Document Content.
     *
     * @var string
     */
    private $content;

    /**
     * Constructor.
     *
     * @param  array  Table from DB.
     *
     * @return void
     */
    public function __construct(array $row)
    {
        $this->title = $row[3];
        $this->userId = $row[4]; // Let's pretend...
        $this->content = $row[6];
    }

    /**
     * Returns Document title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets new title for Document.
     *
     * @param string $title Sets new Document title.
     *
     * @return $this
     */
    public function setTitle(string $title): Document
    {
      $this->title = $title;
      return $this;
    }

    /**
     * Returns Document owner ID.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Sets new title for Document.
     *
     * @param int $title Sets new Document owner.
     *
     * @return $this
     */
    public function setUserId(int $userId): Document
    {
      $this->userId = $userId;
      return $this;
    }

    /**
     * Returns Document content.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Sets new content for Document.
     *
     * @param string $content Sets new Document content.
     *
     * @return $this
     */
    private function setContent(string $content): Document
    {
      return $this;
    }
}
