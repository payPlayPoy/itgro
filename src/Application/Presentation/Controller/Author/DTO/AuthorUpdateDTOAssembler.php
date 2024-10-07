<?php

namespace Application\Presentation\Controller\Author\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorUpdateDTOAssembler
{
    /**
     * @param Request $request
     *
     * @return AuthorUpdateDTO
     */
    public function assemble(Request $request): AuthorUpdateDTO
    {
        return (new AuthorUpdateDTO($request->input('id')))
            ->setName($request->input('name'))
            ->setInformation($request->input('information'))
            ->setBirthDate(new Carbon($request->input('birthDate')));
    }
}
