<?php

namespace App\Services;

use App\Domain\Interfaces\JsonParserInterface;

class JsonParserService implements JsonParserInterface
{
    public function parseAnalyzerPrompt(string $input): array
    {
        preg_match_all('/- (.+)/', $input, $matches);
        $keywords = $matches[1] ?? [];

        $analysis = '';
        if (str_contains($input, 'Analysis:')) {
            $analysis = trim(explode('Analysis:', $input)[1]);
        }

        return [
            'keywords' => $keywords,
            'analysis' => $analysis,
        ];
    }
}
