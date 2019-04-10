<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory;

class ResponseMacroManager
{
    protected $macros = [];

    public function __construct(ResponseFactory $factory)
    {
        $this->macros = [
            Response\Macro\Success::class,
            Response\Macro\Error::class,
            Response\Macro\Download::class,
        ];

        $this->bindMacros($factory);
    }

    public function bindMacros($factory)
    {
        foreach ($this->macros as $macro)
        {
            (new $macro)->run($factory);
        }
    }
}
