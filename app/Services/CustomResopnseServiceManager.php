<?php namespace App\Services;

class CustomResopnseServiceManager
{

    public function makeResult($data, $message)
    {
        return [
            'flag' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    public function makeError($data, $message)
    {
        return [
            'flag' => false,
            'message' => $message,
            'data' => $data,
        ];
    }

    /**
     * 當取得列表時需要另外傳meta資料時
     * @param  [type] $data    [description]
     * @param  [type] $message [description]
     * @param  [type] $meta    [description]
     * @return [type]          [description]
     */
    public function makeListResult($data, $message, $meta)
    {
        $result = $this->makeResult($data, $message);
        $result['meta'] = $meta;

        return $result;
    }

    /**
     * 當取得列表時需要另外傳redirect資料時
     * @param  [type] $data    [description]
     * @param  [type] $message [description]
     * @param  [type] $meta    [description]
     * @return [type]          [description]
     */
    public function makeRedirectResult($data, $message, $redirect)
    {
        $result = $this->makeResult($data, $message);
        $result['redirect'] = $redirect;

        return $result;
    }
}
