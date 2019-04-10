<?php

namespace App\Http\Requests\Todo;

use App\Http\Requests\JsonRequest;

class Show extends JsonRequest
{

    public function rules()
    {
        return [
            'id' => 'string|exists:todo_lists,id,deleted_at,NULL',
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => trans('todo_list.validation.show.id.exists'),
        ];
    }

    protected function validationData()
    {
        return array_merge($this->request->all(), [
            'id' => request()->route('to_do'),
        ]);
    }
}
