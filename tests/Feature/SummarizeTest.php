<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SummarizeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Http::fake([
            'router.huggingface.co/*' => Http::response([['summary_text' => 'Test fake summary']]),
        ]);

        $text = str_repeat('Laravel is great. ', 100);

        $response = $this->postJson('/api/summarize', [
            'text' => $text,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'summary' => 'Test fake summary',
            ]);
    }
}
