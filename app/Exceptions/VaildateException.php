<?php

namespace App\Exceptions;

use Exception;


class VaildateException extends Exception {

    public function __construct($column, $message)
    {
        $this->column  = $column;
        $this->message = $message;
        $this->code = 'vaildate_exception';
    }
}