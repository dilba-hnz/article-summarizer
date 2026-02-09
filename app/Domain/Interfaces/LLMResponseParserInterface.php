<?php

namespace App\Domain\Interfaces;

interface LLMResponseParserInterface
{
    public function parseAnalyzerPrompt(string $input): array;
}
