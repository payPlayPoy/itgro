<?php

namespace Domain\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $information
 * @property string $birth_date
 */
class AuthorModel extends Model
{
    protected $table = 'author';

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setName(string $firstName): self
    {
        $this->name = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInformation(): ?string
    {
        return $this->information;
    }

    /**
     * @param string|null $information
     *
     * @return $this
     */
    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBirthDate(): ?string
    {
        return $this->birth_date;
    }

    /**
     * @param string|null $birthDate
     *
     * @return $this
     */
    public function setBirthDate(?string $birthDate): self
    {
        $this->birth_date = $birthDate;

        return $this;

    }

    /**
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(BookModel::class, 'author_id');
    }
}
