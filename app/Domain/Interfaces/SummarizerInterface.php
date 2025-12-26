<?php

namespace App\Domain\Interfaces;

interface SummarizerInterface
{
    public function summarize(string $text): string;
}
