<?php

namespace Application\Presentation\Controller\Book\DTO;

use Carbon\Carbon;

class BookCreatingDTO
{
    private ?string $annotation;

    /**
     * @param int $authorId
     * @param string $title
     * @param Carbon $creatingDate
     */
    public function __construct(
        private int $authorId,
        private string $title,
        private Carbon $creatingDate
    ) {}

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * @return Carbon
     */
    public function getCreatingDate(): Carbon
    {
        return $this->creatingDate;
    }
}
