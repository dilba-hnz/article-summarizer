<?php

namespace App\Providers;

use App\Domain\Interfaces\SummarizerInterface;
use App\Services\SummarizerArticleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SummarizerInterface::class, SummarizerArticleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
