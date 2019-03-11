<?php

namespace App\Exceptions\QueryExceptions;

use Exception;

class QueryException extends Exception
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendResponseError()
    {
        return response(['errors' => [$this->getMessage()], 'success' => false ], $this->getCode());
    }
}
