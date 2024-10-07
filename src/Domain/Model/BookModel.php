<?php

namespace Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $created_date
 * @property ?string $annotation
 */
class BookModel extends Model
{
    protected $table = 'book';

    /**
     * @return string
     */
    public function getCreatedDate(): string
    {
        return $this->created_date;
    }

    /**
     * @param string $createdDate
     *
     * @return $this
     */
    public function setCreatedDate(string $createdDate): self
    {
        $this->created_date = $createdDate;

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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $authorId
     *
     * @return $this
     */
    public function setAuthorId(int $authorId): self
    {
        $this->author_id = $authorId;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(AuthorModel::class, 'author_id');
    }
}
