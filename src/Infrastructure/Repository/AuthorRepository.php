<?php

namespace Infrastructure\Repository;

use Domain\Model\AuthorModel;
use Illuminate\Database\Eloquent\Collection;


class AuthorRepository
{
    /**
     * @param int $id
     *
     * @return AuthorModel|null
     */
    public function getById(int $id): ?AuthorModel
    {
        return AuthorModel::query()->find($id);
    }

    public function getList(int $page, int $pageSize, string $filter): Collection
    {
        $authorList = AuthorModel::query()
            ->withCount('books')
            ->forPage($page, $pageSize);

        $authorList->orderBy('books_count', $filter);

        return $authorList->get();
    }

    public function getCount(): int
    {
        return AuthorModel::query()->count();
    }
}
