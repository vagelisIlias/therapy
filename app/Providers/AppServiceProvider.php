<?php

namespace App\Providers;

use Illuminate\Support\AggregateServiceProvider;
use Modules\Users\UserServiceProvider;

class AppServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        UserServiceProvider::class,
    ];
}
