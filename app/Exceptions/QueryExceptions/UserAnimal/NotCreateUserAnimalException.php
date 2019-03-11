<?php

namespace App\Exceptions\QueryExceptions\UserAnimal;

use \App\Exceptions\QueryExceptions\QueryException;

class NotCreateUserAnimalException extends QueryException
{
    /**
     * @var string
     */
    protected $message = 'User animal did not save in db';

    /**
     * @var integer
     */
    protected $code = 500;
}
