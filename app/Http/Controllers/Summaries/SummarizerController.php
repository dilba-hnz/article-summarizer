<?php

namespace App\Http\Controllers\Summaries;

use App\Actions\SummarizeArticleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\TextRequest;

class SummarizerController extends Controller
{
    public function summarize(TextRequest $request, SummarizeArticleAction $action)
    {
        $data = $request->validated();

        $summary = $action->handle($data['text']);

        return response()->json([
            'summary' => $summary,
        ]);
    }
}
