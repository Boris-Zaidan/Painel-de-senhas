<?php

namespace App\Exceptions;

use Exception;

class PacienteNaoEncontradoException extends Exception
{
    public function __construct(string $message)
    {

        parent::__construct($message, 404);

    }
}
