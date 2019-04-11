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
            'title.required' => trans('todo_list.validation.store.title.required'),
            'content.required' => trans('todo_list.validation.store.content.required'),
        ];
    }
}
