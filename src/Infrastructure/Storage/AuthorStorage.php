<?php

namespace Infrastructure\Storage;

use Application\Presentation\Controller\Author\DTO\AuthorCreateDTO;
use Application\Presentation\Controller\Author\DTO\AuthorUpdateDTO;
use Domain\Model\AuthorModel;

class AuthorStorage
{
    /**
     * @param AuthorCreateDTO $authorCreateDTO
     *
     * @return AuthorModel
     */
    public function create(AuthorCreateDTO $authorCreateDTO): AuthorModel
    {
        $authorModel = new AuthorModel();
        $authorModel->setName($authorCreateDTO->getName())
            ->setInformation($authorCreateDTO->getInformation())
            ->setBirthDate($authorCreateDTO->getBirthDate())
            ->save();

        return $authorModel;
    }

    /**
     * @param AuthorUpdateDTO $authorUpdateDTO
     * @param AuthorModel $authorModel
     *
     * @return void
     */
    public function update(AuthorUpdateDTO $authorUpdateDTO, AuthorModel $authorModel): void
    {
        if ($authorModel->getName()) {
            $authorModel->setName($authorUpdateDTO->getName());
        }

        if ($authorModel->getInformation()) {
            $authorModel->setInformation($authorUpdateDTO->getInformation());
        }

        if ($authorModel->getBirthDate()) {
            $authorModel->setBirthDate($authorUpdateDTO->getBirthDate());
        }

        $authorModel->save();
    }
}
