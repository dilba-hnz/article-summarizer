<?php

namespace App\Domain\Interfaces;

interface JsonParserInterface
{
    public function parseAnalyzerPrompt(string $input): array;
}
