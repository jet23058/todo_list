<?php

namespace App\Http\Requests\Todo;

use App\Http\Requests\JsonRequest;

class StoreInfo extends JsonRequest
{

    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'attachment' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
