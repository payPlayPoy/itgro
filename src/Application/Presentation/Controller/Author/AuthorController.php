<?php

namespace Application\Presentation\Controller\Author;

use Application\Presentation\Controller\Author\DTO\AuthorCreateDTOAssembler;
use Application\Presentation\Controller\Author\DTO\AuthorUpdateDTOAssembler;
use Application\Presentation\Request\Author\AuthorCreationRequest;
use Application\Presentation\Request\Author\AuthorUpdatingRequest;
use Application\Service\AuthorService;
use Domain\DTO\PaginationResponseDTO;
use Domain\Model\AuthorModel;
use Exception;
use Illuminate\Http\Request;
use Infrastructure\Repository\AuthorRepository;

class AuthorController
{
    /**
     * @param AuthorCreationRequest $request
     * @param AuthorService $authorService
     * @param AuthorCreateDTOAssembler $authorCreateDTOAssemble
     *
     * @return array
     */
    public function create(
        AuthorCreationRequest $request,
        AuthorService $authorService,
        AuthorCreateDTOAssembler $authorCreateDTOAssemble
    ): array {
        $author = $authorService->create($authorCreateDTOAssemble->assemble($request));

        return [
            'id' => $author->getId()
        ];
    }


    /**
     * @param AuthorUpdatingRequest $request
     * @param AuthorService $authorService
     * @param AuthorUpdateDTOAssembler $authorCreateDTOAssembler
     *
     * @return void
     * @throws Exception
     */
    public function update(
        AuthorUpdatingRequest $request,
        AuthorService $authorService,
        AuthorUpdateDTOAssembler $authorCreateDTOAssembler
    ): void {
        $authorService->update($authorCreateDTOAssembler->assemble($request));
    }

    public function find(int $id): array
    {
        return AuthorModel::query()->with('books')->find($id)->toArray();
    }

    public function getList(Request $request, AuthorRepository $authorRepository)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        $filter = $request->input('filter', 'asc');
        $totalCount = AuthorModel::query()->count();
        $limitPages = ceil($totalCount / $pageSize);

        if ($page > $limitPages) {
            $page = $limitPages;
        }

        return [
            $authorRepository->getList($page, $pageSize, $filter),
            $page,
            $pageSize,
            $totalCount,
            $limitPages
        ];

    }
}
