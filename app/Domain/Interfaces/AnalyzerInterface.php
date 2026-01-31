<?php

namespace App\Domain\Interfaces;

interface AnalyzerInterface
{
    public function analyze(string $text): array;
}
