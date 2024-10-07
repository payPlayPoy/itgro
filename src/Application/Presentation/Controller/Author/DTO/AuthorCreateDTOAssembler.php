<?php

namespace Application\Presentation\Controller\Author\DTO;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorCreateDTOAssembler
{
    /**
     * @param Request $request
     *
     * @return AuthorCreateDTO
     */
    public function assemble(Request $request): AuthorCreateDTO
    {
        return (new AuthorCreateDTO($request->input('name')))
            ->setInformation($request->input('information'))
            ->setBirthDate(new Carbon($request->input('birthDate')));
    }
}
