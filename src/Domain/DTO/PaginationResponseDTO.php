<?php

namespace Domain\DTO;

use Illuminate\Database\Eloquent\Collection;

class PaginationResponseDTO
{
    /**
     * @param Collection $data
     * @param int $page
     * @param int $pageSize
     * @param int $total
     * @param int $limitPages
     */
    public function __construct(
        private Collection $data,
        private int $page,
        private int $pageSize,
        private int $total,
        private int $limitPages
    ){}

    /**
     * @return Collection
     */
    public function getData(): Collection
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getLimitPages(): int
    {
        return $this->limitPages;
    }
}
