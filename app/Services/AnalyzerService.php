<?php

namespace App\Services;

use App\Domain\Interfaces\AnalyzerInterface;
use App\Domain\Interfaces\LLMResponseParserInterface;
use Illuminate\Support\Facades\Http;

class AnalyzerService implements AnalyzerInterface
{

    public function __construct(private LLMResponseParserInterface $parser)
    {
    }

    public function analyze(string $text): array
    {
        $prompt = <<<PROMPT
Summarize the following article and extract 5 important keywords.
Return the response in plain text using the following format:

Keywords:
- keyword1
- keyword2
- keyword3
- keyword4
- keyword5

Analysis:
<short analytical summary>

Article:
$text
PROMPT;

        $apiKey = config('services.huggingface.token');
        $model = env('HUGGINGFACE_MODEL', 'facebook/bart-large-cnn');

        $url = "https://router.huggingface.co/hf-inference/models/{$model}";

        $response = Http::withToken($apiKey)
            ->timeout(30)
            ->post($url, [
                'inputs' => $prompt,
            ])
            ->json();

        $output = $response[0]['summary_text'] ?? '';

        return $this->parser->parseAnalyzerPrompt($output);
    }

}
