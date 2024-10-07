<?php

namespace Application\Presentation\Request\Book;

use Application\Presentation\Request\BaseRequest;

class BookUpdatingRequest extends BaseRequest
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
            'id' => ['required', 'integer'],
            'authorId' => ['nullable', 'integer', 'exists:author,id'],
            'title' => ['nullable', 'string', 'min:2', 'max:40'],
            'annotation' => ['nullable', 'string', 'max:1000'],
            'createdDate' => ['nullable', 'date_format:d-m-Y']
        ];
    }
}
