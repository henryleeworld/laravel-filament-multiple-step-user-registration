<?php

return [

    'title' => '註冊',

    'heading' => '註冊',

    'actions' => [

        'login' => [
            'before' => '或',
            'label' => '登入到您的帳戶',
        ],

    ],

    'form' => [

        'email' => [
            'label' => '電子郵件',
        ],

        'name' => [
            'label' => '姓名',
        ],

        'password' => [
            'label' => '密碼',
            'validation_attribute' => '密碼',
        ],

        'password_confirmation' => [
            'label' => '確認密碼',
        ],

        'actions' => [

            'register' => [
                'label' => '註冊',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => '嘗試註冊次數過多',
            'body' => '請 :seconds 秒後再試。',
        ],

    ],

];
