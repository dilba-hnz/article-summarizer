<?php

namespace App\Actions;

use App\Domain\Interfaces\SummarizerInterface;

class SummarizeArticleAction
{
    public function __construct(private SummarizerInterface $summarizer) {}

    public function handle(string $text): string
    {
        $plain = strip_tags($text);
        return $this->summarizer->summarize($plain);
    }
}
