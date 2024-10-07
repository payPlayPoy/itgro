<?php

namespace Application\Presentation\Response;

use Domain\DTO\PaginationResponseDTO;
use Domain\Model\AuthorModel;

class AuthorResponseBuilder
{
    /**
     * @param PaginationResponseDTO $paginationResponseDTO
     *
     * @return array
     */
    public function buildGetListResponse(PaginationResponseDTO $paginationResponseDTO): array
    {
        $itemList = [];
        foreach ($paginationResponseDTO->getData() as $user) {
            $itemList[] = $this->buildGetResponse($user);
        }

        return [
            'itemList' => $itemList,
            'paginationDetails' => $this->getPaginationDetails($paginationResponseDTO)
        ];
    }

    /**
     * @param PaginationResponseDTO $paginationResponseDTO
     *
     * @return array
     */
    private function getPaginationDetails(PaginationResponseDTO $paginationResponseDTO): array
    {
        return [
            'page' => $paginationResponseDTO->getPage(),
            'pageSize' => $paginationResponseDTO->getPageSize(),
            'total' => $paginationResponseDTO->getTotal(),
            'limitPages' => $paginationResponseDTO->getLimitPages(),
            'hasPreviousPage' => $paginationResponseDTO->getPage() > 1,
            'hasNextPage' => $paginationResponseDTO->getPage() < $paginationResponseDTO->getLimitPages(),
        ];
    }

    /**
     * @param AuthorModel $authorModel
     * @return array
     */
    public function buildGetResponse(AuthorModel $authorModel): array
    {
        return [
            'id' => $authorModel->getId(),
            'firstName' => $authorModel->getFirstName(),
            'lastName' => $authorModel->getLastName(),
            'information' => $authorModel->getInformation(),
            'dateOfBirth' => $authorModel->getBirthDate(),
        ];
    }
}
