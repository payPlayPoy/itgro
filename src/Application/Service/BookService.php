<?php

namespace Application\Service;

use Application\Presentation\Controller\Book\DTO\BookCreatingDTO;
use Application\Presentation\Controller\Book\DTO\BookUpdatingDTO;
use Domain\Model\BookModel;
use Infrastructure\Storage\BookStorage;

class BookService
{
    public function __construct(private BookStorage $bookStorage) {}

    /**
     * @param BookCreatingDTO $bookCreatingDTO
     *
     * @return BookModel
     */
    public function create(BookCreatingDTO $bookCreatingDTO): BookModel
    {
        return $this->bookStorage->create($bookCreatingDTO);
    }

    /**
     * @param BookUpdatingDTO $bookUpdatingDTO
     *
     * @return void
     *
     * @throws \Exception
     */
    public function update(BookUpdatingDTO $bookUpdatingDTO): void
    {
        $bookModel = BookModel::query()->find($bookUpdatingDTO->getId());
        if (!$bookModel) {
            throw new \Exception('Книга не найдена');
        }

        $this->bookStorage->update($bookUpdatingDTO, $bookModel);
    }
}
