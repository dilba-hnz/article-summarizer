<?php

use App\Http\Controllers\Summaries\SummarizerController;
use Illuminate\Support\Facades\Route;


Route::post('/summarize', [SummarizerController::class, 'summarize']);

