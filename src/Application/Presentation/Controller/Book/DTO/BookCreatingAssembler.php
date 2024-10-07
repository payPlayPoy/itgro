<?php

namespace Application\Presentation\Controller\Book\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;

class BookCreatingAssembler
{
    /**
     * @param Request $request
     *
     * @return BookCreatingDTO
     */
    public function assemble(Request $request): BookCreatingDTO
    {
        return (new BookCreatingDTO(
            $request->input('authorId'),
            $request->input('title'),
            new Carbon($request->input('createdDate')),
        ))->setAnnotation($request->input('annotation'));
    }
}
