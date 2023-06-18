<?php

namespace App\Providers;

use App\Services\INewsletter;
use App\Services\MailchimpNewsLetter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(INewsletter::class, fn($app) => new MailchimpNewsLetter(new ApiClient));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
