<?php

namespace Application\Presentation\Controller\Author\DTO;

use Carbon\Carbon;

class AuthorCreateDTO
{
    private string $name;
    private null|string $information;
    private null|Carbon $birthDate;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
