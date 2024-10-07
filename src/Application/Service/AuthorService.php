<?php

namespace Application\Service;

use Application\Presentation\Controller\Author\DTO\AuthorCreateDTO;
use Application\Presentation\Controller\Author\DTO\AuthorUpdateDTO;
use Domain\DTO\PaginationResponseDTO;
use Domain\Model\AuthorModel;
use Exception;
use Infrastructure\Repository\AuthorRepository;
use Infrastructure\Storage\AuthorStorage;

class AuthorService
{
    /**
     * @param AuthorStorage $authorStorage
     * @param AuthorRepository $authorRepository
     */
    public function __construct(
        private AuthorStorage $authorStorage,
        private AuthorRepository $authorRepository,
    ) {}

    /**
     * @param AuthorCreateDTO $authorCreateDTO
     *
     * @return AuthorModel
     */
    public function create(AuthorCreateDTO $authorCreateDTO): AuthorModel
    {
        return $this->authorStorage->create($authorCreateDTO);
    }

    /**
     * @param AuthorUpdateDTO $authorUpdateDTO
     *
     * @return void
     *
     * @throws Exception
     */
    public function update(AuthorUpdateDTO $authorUpdateDTO): void
    {
        $authorModel = $this->authorRepository->getById($authorUpdateDTO->getId());
        if (!$authorModel) {
            throw new Exception('Автор не найден');
        }

        $this->authorStorage->update($authorUpdateDTO, $authorModel);
    }

    public function getList(int $page, int $pageSize): PaginationResponseDTO
    {
        $totalCount = $this->authorRepository->getCount();

        $limitPages = ceil($totalCount / $pageSize);

        if ($page > $limitPages) {
            $page = $limitPages;
        }

        return new PaginationResponseDTO(
            $this->authorRepository->getList($page, $pageSize),
            $page,
            $pageSize,
            $totalCount,
            $limitPages
        );
    }
}
