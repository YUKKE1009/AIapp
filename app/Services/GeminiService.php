<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    private string $apiKey;
    private string $endpoint;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
        $this->endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';
    }

    public function analyze(string $prompt): string
    {
        $response = Http::post("{$this->endpoint}?key={$this->apiKey}", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]                
                ]
            ]
        ]);

        $data = $response->json();

        // 💡 どんなデータ構造（思考プロセス入り等）でも、AIの本文テキストを確実に見つけ出すループ処理
        $parts = data_get($data, 'candidates.0.content.parts', []);
        foreach ($parts as $part) {
            // text というキーがあり、かつ中に「思考（thought）」のデータが入っていない純粋な本文を返す
            if (isset($part['text']) && !isset($part['thought'])) {
                return $part['text'];
            }
        }

        // もし上記で見つからなければ、一番最初のパーツをとりあえず出す
        return data_get($data, 'candidates.0.content.parts.0.text') ?? 'エラーが発生しました';
    }
}