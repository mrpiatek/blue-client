<?php

namespace MrPiatek\BlueClient\Exceptions;


class UnprocessableEntityException extends \Exception
{
    /** @var array */
    private $errors;

    /**
     * UnprocessableEntityException constructor.
     *
     * @param $errors
     */
    public function __construct(array $errors)
    {
        parent::__construct('Unprocessable entity.');
        $this->errors = $errors;
    }

    /**
     * Returns errors that caused this exception.
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}