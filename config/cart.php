<?php

return [
    'cookie' => [
        'name' => env('CART_COOKIE_NAME', 'cart_cookie'),
        'expiration' => 24 * 60, // One day
    ],
];
