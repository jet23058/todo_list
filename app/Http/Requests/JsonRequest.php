<?php 
namespace App\Http\Requests;

use App\Exceptions\VaildateException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class JsonRequest extends FormRequest
{

    public function authorize()
    {
        return $this->isJson();
    }

    public function response(array $errors)
    {
        $message = implode(PHP_EOL, array_slice(array_flatten($errors), 0, 5));
        return Response::json(ResponseManager::makeError("VALID_ERROR", $message));
    }

    protected function failedAuthorization()
    {
        throw new VaildateException(null, 'use json format');
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->toArray() as $key => $value) {
            throw new VaildateException($key, $value[0]);
        }
    }
}
