<?php

namespace Infrastructure\Repository;

use Domain\Model\BookModel;

class BookRepository
{
    /**
     * @param int $id
     *
     * @return BookModel|null
     */
    public function get(int $id): ?BookModel
    {
        return BookModel::query()->with('author')->find($id);
    }
}
