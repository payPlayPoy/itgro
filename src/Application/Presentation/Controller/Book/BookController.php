<?php

namespace Application\Presentation\Controller\Book;

use Application\Presentation\Controller\Book\DTO\BookCreatingAssembler;
use Application\Presentation\Controller\Book\DTO\BookUpdatingAssembler;
use Application\Presentation\Request\Book\BookCreationRequest;
use Application\Presentation\Request\Book\BookUpdatingRequest;
use Application\Service\BookService;
use Domain\Model\AuthorModel;
use Domain\Model\BookModel;
use Illuminate\Http\Request;
use Infrastructure\Repository\BookRepository;

class BookController
{
    /**
     * @param BookCreationRequest $request
     * @param BookCreatingAssembler $bookCreatingAssembler
     * @param BookService $bookService
     *
     * @return array
     */
    public function create(BookCreationRequest $request, BookCreatingAssembler $bookCreatingAssembler, BookService $bookService): array
    {
        $bookModel = $bookService->create($bookCreatingAssembler->assemble($request));

        return [
            'id' => $bookModel->getId()
        ];
    }

    /**
     * @param BookUpdatingRequest $request
     * @param BookUpdatingAssembler $bookUpdatingAssembler
     * @param BookService $bookService
     *
     * @return void
     *
     * @throws \Exception
     */
    public function update(BookUpdatingRequest $request, BookUpdatingAssembler $bookUpdatingAssembler, BookService $bookService): void
    {
        $bookService->update($bookUpdatingAssembler->assemble($request));
    }

    public function getList(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        $totalCount = AuthorModel::query()->count();
        $limitPages = ceil($totalCount / $pageSize);

        if ($page > $limitPages) {
            $page = $limitPages;
        }

        return [
            BookModel::query()->with('author')->forPage($page, $pageSize)->get(),
            $page,
            $pageSize,
            $totalCount,
            $limitPages
        ];
    }

    public function find(int $id, BookRepository $bookRepository)
    {
        return $bookRepository->get($id);
    }
}
