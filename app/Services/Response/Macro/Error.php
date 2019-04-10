<?php

namespace App\Services\Response\Macro;

use App\Services\Response\ResponseMacroInterface;

class Error implements ResponseMacroInterface
{
    public function run($factory)
    {
        $factory->macro('error', function ($data = '', $message = '', $options = [], $status = 400) use ($factory) {

            $result = [
                'flag' => false,
                'message' => $message,
                'data' => $data,
            ];

            // array merge
            if (!empty($options)) {
                $result += $options;
            }

            return $factory->json($result, $status);
        });
    }
}
