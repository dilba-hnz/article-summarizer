<?php

namespace App\Providers;

use App\Domain\Interfaces\AnalyzerInterface;
use App\Domain\Interfaces\LLMResponseParserInterface;
use App\Domain\Interfaces\SummarizerInterface;
use App\Services\AnalyzerService;
use App\Services\LLMResponseParserService;
use App\Services\SummarizerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SummarizerInterface::class, SummarizerService::class);
        $this->app->bind(AnalyzerInterface::class, AnalyzerService::class);
        $this->app->bind(LLMResponseParserInterface::class, LLMResponseParserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
