<?php

namespace Application\Presentation\Controller\Book\DTO;

use Illuminate\Http\Request;

class BookUpdatingAssembler
{
    /**
     * @param Request $request
     *
     * @return BookUpdatingDTO
     */
    public function assemble(Request $request): BookUpdatingDTO
    {
        return (new BookUpdatingDTO($request->input('id')))
            ->setAnnotation($request->input('annotation'))
            ->setTitle($request->input('title'))
            ->setCreatedDate($request->input('createdDate'))
            ->setAuthorId($request->input('authorId'));
    }
}
