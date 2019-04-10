<?php

namespace App\Exceptions;

use App\Exceptions\VaildateException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

const SUCCESS_CODE = 200;
const ERROR_CODE = 500;
class Handler extends ExceptionHandler
{
    private $code = SUCCESS_CODE;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $data = [];
        if ($request->is('api/*')) {
            $message = ($this->isProduction() && $this->isQueryException($exception)) ? trans('exception.error') : $exception->getMessage();
            if ($exception instanceof VaildateException) {
                if ($this->isProduction()) {
                    $data['column'] = $exception->column;
                }
                $this->code = ERROR_CODE;
            }
            $result = $this->isSuccess() ? 'success' : 'error';
            return response()->$result($data, $message, [], $this->code);
        }
        return parent::render($request, $exception);
    }

    private function isSuccess(): bool
    {
        return $this->code == SUCCESS_CODE;
    }

    private function isProduction(): bool
    {
        return app()->environment("production");
    }

    private function isQueryException(Exception $exception): bool
    {
        $exception instanceof \Illuminate\Database\QueryException || $e instanceof PDOException;
    }
}
