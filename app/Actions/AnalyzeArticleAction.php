<?php

namespace App\Actions;

use App\Domain\Interfaces\AnalyzerInterface;

class AnalyzeArticleAction
{
    public function __construct(private AnalyzerInterface $analyzer)
    {
    }

    public function handle(string $text): array
    {
        $plain = strip_tags($text);

        return $this->analyzer->analyze($plain);
    }
}
