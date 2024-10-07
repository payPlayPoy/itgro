<?php

namespace Application\Presentation\Request\Book;

use Application\Presentation\Request\BaseRequest;

class BookCreationRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'authorId' => ['required', 'integer', 'exists:author,id'],
            'title' => ['required', 'string', 'min:2', 'max:40'],
            'annotation' => ['nullable', 'string', 'max:1000'],
            'createdDate' => ['required', 'date_format:d-m-Y']
        ];
    }
}
