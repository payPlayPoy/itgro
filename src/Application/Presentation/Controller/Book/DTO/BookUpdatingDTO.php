<?php

namespace Application\Presentation\Controller\Book\DTO;

use Carbon\Carbon;

class BookUpdatingDTO
{
    private ?int $authorId;
    private ?string $title;
    private ?string $annotation;
    private ?Carbon $createdDate;

    /**
     * @param int $id
     */
    public function __construct(private int $id) {}

    /**
     * @return int|null
     */
    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    /**
     * @param int|null $authorId
     *
     * @return $this
     */
    public function setAuthorId(?int $authorId): self
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return $this
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAnnotation(): ?string
    {
        return $this->annotation;
    }

    /**
     * @param string|null $annotation
     *
     * @return $this
     */
    public function setAnnotation(?string $annotation): self
    {
        $this->annotation = $annotation;

        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getCreatedDate(): ?Carbon
    {
        return $this->createdDate;
    }

    /**
     * @param Carbon|null $createdDate
     *
     * @return $this
     */
    public function setCreatedDate(?Carbon $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
