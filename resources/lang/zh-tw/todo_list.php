<?php
return [
    'success' => [
        'index' => '列表資訊取得成功',
        'show' => '資訊取得成功',
        'store' => '待辦事項新增成功',
        'update' => '待辦事項更新成功',
        'destory' => '待辦事項刪除成功',
    ],
    'validation' => [
        'init' => '該筆資料不存在',
        'store' => [
            'title' => [
                'required' => 'title 為必填欄位',
            ],
            'content' => [
                'required' => 'content 為必填欄位',
            ],
        ],
        'show' => [
            'id' => [
                'exists' => '該筆資料不存在',
            ],
        ],
        'update' => [
            'id' => [
                'exists' => '該筆資料不存在',
            ],
            'title' => [
                'required' => 'title 為必填欄位',
            ],
            'content' => [
                'required' => 'content 為必填欄位',
            ],
        ],
        'destory' => [
            'id' => [
                'exists' => '該筆資料不存在',
            ],
        ],
    ],
];
