<?php

namespace App\Http\Controllers\Analyze;

use App\Actions\AnalyzeArticleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\TextRequest;

class AnalyzeController extends Controller
{
    public function analyze(TextRequest $request, AnalyzeArticleAction $action)
    {
        $data = $request->validated();

        return response()->json([
            $action->handle($data['text'])
        ]);
    }
}
