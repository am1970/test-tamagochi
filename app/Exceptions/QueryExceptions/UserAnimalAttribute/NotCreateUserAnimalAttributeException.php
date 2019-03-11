<?php

namespace App\Exceptions\QueryExceptions\UserAnimalAttribute;

use \App\Exceptions\QueryExceptions\QueryException;

class NotCreateUserAnimalAttributeException extends QueryException
{
    /**
     * @var string
     */
    protected $message = 'Attribute of animal did not save in db';

    /**
     * @var integer
     */
    protected $code = 500;
}
