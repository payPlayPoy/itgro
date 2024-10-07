<?php

namespace Infrastructure\Storage;

use Application\Presentation\Controller\Book\DTO\BookCreatingDTO;
use Application\Presentation\Controller\Book\DTO\BookUpdatingDTO;
use Domain\Model\BookModel;

class BookStorage
{
    /**
     * @param BookCreatingDTO $bookCreatingDTO
     *
     * @return BookModel
     */
    public function create(BookCreatingDTO $bookCreatingDTO): BookModel
    {
        $bookModel = new BookModel();
        $bookModel->setTitle($bookCreatingDTO->getTitle())
            ->setCreatedDate($bookCreatingDTO->getCreatingDate())
            ->setAnnotation($bookCreatingDTO->getAnnotation())
            ->setAuthorId($bookCreatingDTO->getAuthorId())
            ->save();

        return $bookModel;
    }

    /**
     * @param BookUpdatingDTO $bookUpdatingDTO
     * @param BookModel $bookModel
     *
     * @return void
     */
    public function update(BookUpdatingDTO $bookUpdatingDTO, BookModel $bookModel): void
    {
        if ($bookUpdatingDTO->getTitle()) {
            $bookModel->setTitle($bookUpdatingDTO->getTitle());
        }

        if ($bookUpdatingDTO->getAnnotation()) {
            $bookModel->setAnnotation($bookUpdatingDTO->getAnnotation());
        }

        if ($bookUpdatingDTO->getCreatedDate()) {
            $bookModel->setCreatedDate($bookUpdatingDTO->getCreatedDate());
        }

        if ($bookUpdatingDTO->getAuthorId()) {
            $bookModel->setAuthorId($bookUpdatingDTO->getAuthorId());
        }

        $bookModel->save();
    }
}
