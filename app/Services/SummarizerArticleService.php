<?php

namespace App\Services;

use App\Domain\Interfaces\SummarizerInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SummarizerArticleService implements SummarizerInterface
{

    public function summarize(string $text): string
    {
        $apiKey = config('services.huggingface.token');
        $model = env('HUGGINGFACE_MODEL', 'facebook/bart-large-cnn');

        $url = "https://router.huggingface.co/hf-inference/models/{$model}";

        $response = Http::withToken($apiKey)
            ->timeout(30)
            ->post($url, [
                'inputs' => $text,
                'parameters' => [
                    'min_length' => 50,
                    'max_length' => 150,
                ],
            ]);

        if ($response->failed()) {
            // fallback: return short manual summary or throw
            return 'Unable to summarize at the moment.';
        }

        $json = $response->json();

        // Different models may return shape differently — handle safely
        if (isset($json[0]['summary_text'])) {
            return Str::limit($json[0]['summary_text'], 1000);
        }

        if (isset($json['summary_text'])) {
            return Str::limit($json['summary_text'], 1000);
        }

        // If API returns plain string or text
        if (is_string($json)) {
            return Str::limit($json, 1000);
        }

        return json_encode($json);
    }
}
