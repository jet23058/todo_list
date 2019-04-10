<?php

namespace App\Services\Response\Macro;

use App\Services\Response\ResponseMacroInterface;

class Success implements ResponseMacroInterface
{
    public function run($factory)
    {
        $factory->macro('success', function ($data = '', $message = '', $options = [], $status = 200, $autoPaginate = false) use ($factory) {
            $result = [
                'flag' => true,
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
