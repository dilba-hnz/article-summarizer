<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AnalyzeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Http::fake([
            'router.huggingface.co/*' => Http::response([
                [
                    'summary_text' => <<<TEXT
Keywords:
- Laravel
- AI
- Backend
- API
- LLM

Analysis:
This article explains how AI can be integrated into backend systems.
TEXT
                ]
            ])
        ]);

        $text = str_repeat('Laravel and AI are powerful. ', 20);

        $response = $this->postJson('/api/analyze', [
            'text' => $text,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'keywords' => [
                    'Laravel',
                    'AI',
                    'Backend',
                    'API',
                    'LLM',
                ],
                'analysis' => 'This article explains how AI can be integrated into backend systems.',
            ]);
    }
}
