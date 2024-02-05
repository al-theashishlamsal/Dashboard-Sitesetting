<?php

use App\AdminUser;
use App\Models\User;

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [ // Define a guard for admin users
            'driver' => 'session',
            'provider' => 'admins', // Use the 'admins' provider for admin users
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [ // Define a provider for admin users
            'driver' => 'eloquent',
            'model' => User::class, // Use the 'AdminUser' model for admin users
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        // Add a password reset configuration for admin users
        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_resets', // Customize the table name if needed
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
