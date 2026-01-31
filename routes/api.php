<?php

use App\Http\Controllers\Analyze\AnalyzeController;
use App\Http\Controllers\Summaries\SummarizerController;
use Illuminate\Support\Facades\Route;


Route::post('/summarize', [SummarizerController::class, 'summarize']);
Route::post('/analyze', [AnalyzeController::class, 'analyze']);

