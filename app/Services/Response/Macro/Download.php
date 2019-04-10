<?php

namespace App\Services\Response\Macro;

use App\Services\Response\ResponseMacroInterface;

class Download implements ResponseMacroInterface
{
    public function run($factory)
    {
        $factory->macro('download', function ($filePath = '/', $returnFileName = 'cashier-example.zip', $headers = []) use ($factory) {
            $file = $filePath;

            $headers = (!empty($headers)) ? $headers : [
                'Content-Type: application/zip, application/octet-stream',
            ];

            return $factory->download($file, $returnFileName, $headers);
        });
    }
}
