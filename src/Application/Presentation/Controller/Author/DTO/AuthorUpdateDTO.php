<?php

namespace Application\Presentation\Controller\Author\DTO;

use Carbon\Carbon;

class AuthorUpdateDTO
{
    private int $id;
    private ?string $name = null;
    private ?string $information = null;
    private ?Carbon $birthDate = null;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

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
     * @return Carbon|null
     */
    public function getBirthDate(): ?Carbon
    {
        return $this->birthDate;
    }

    /**
     * @param Carbon|null $birthDate
     *
     * @return $this
     */
    public function setBirthDate(?Carbon $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
