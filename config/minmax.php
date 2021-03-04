<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Minmax Project Parameters
    |--------------------------------------------------------------------------
    |
    | Those parameters are used for project. Usually they are set at .env file.
    |
    */

    'editor_module' => env('EDITOR_MODULE', 'tinymce'),

    'menu_layer_limit' => env('MENU_LAYER_LIMIT', 2),

    'article_layer_limit' => env('ARTICLE_LAYER_LIMIT', 3),

    'ad_layer_limit' => env('AD_LAYER_LIMIT', 3),

    'ecommerce_layer_limit' => env('ECOMMERCE_LAYER_LIMIT', 3),

    'draft_limit' => env('DRAFT_LIMIT', 5),

    'repository_injections' => [
        // ['Minmax\Base\Admin\DemoController', 'App\Repositories\Admin\DemoRepository'],
    ],

    'cdn' => [
        // 'cdnjs.cloudflare.com' => 'css|js|jpg|png|gif|svg',
    ],

    'ecommerce_service' => [
        'cashier' => \Minmax\Ecommerce\Services\Cashier::class,
        'cart' => \Minmax\Ecommerce\Services\Cart::class,
        'product' => \Minmax\Ecommerce\Services\Product::class,
        'bonus_calculator' => \Minmax\Ecommerce\Services\BonusCalculator::class,
        'crypt_column' => [
            'order_form' => [
                'billing' => ['name', 'email', 'phone', 'mobile', 'address.street'],
                'shipping' => ['name', 'email', 'phone', 'mobile', 'address.street'],
                'receipt' => ['vehicle_code', 'address.street'],
            ],
            'order_payment' => [
                'details' => ['name', 'email', 'phone', 'mobile', 'address.street'],
            ],
            'order_delivery' => [
                'details' => ['name', 'email', 'phone', 'mobile', 'address.street'],
            ],
            'order_return' => [
                'details' => ['name', 'email', 'phone', 'mobile', 'address.street', 'refund_account'],
            ],
        ],
        'sale_page' => ['discount', 'gift', 'collect'],
    ],

    'marcom' => [
        'short_char' => env('SHORT_LINK_CHAR', 's'),
    ],

];
