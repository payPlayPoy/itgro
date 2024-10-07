<?php

namespace Domain\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ValidationException extends Exception
{
    private array $errorList;

    /**
     * @param array $errorList
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(array $errorList, int $code = Response::HTTP_FORBIDDEN, ?Throwable $previous = null)
    {
        parent::__construct('Ошибка валидации', $code, $previous);

        $this->errorList = $errorList;
    }

    /**
     * @return array
     */
    public function getErrorList(): array
    {
        return $this->errorList;
    }
}
