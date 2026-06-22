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

        // 1. 通常のテキスト抽出を試みる
        $parts = data_get($data, 'candidates.0.content.parts', []);
        foreach ($parts as $part) {
            if (isset($part['text']) && !isset($part['thought'])) {
                return $part['text'];
            }
        }

        // 2. もし上記で見つからなければ、一番最初のパーツをとりあえず出す
        $fallback = data_get($data, 'candidates.0.content.parts.0.text');
        if ($fallback) {
            return $fallback;
        }

        // ❌ 3. 【重要】これでもダメなら、エラーの代わりにGoogleから返ってきた生のエラーメッセージ等を画面に出す
        if (isset($data['error']['message'])) {
            return 'Google APIエラー: ' . $data['error']['message'];
        }

        // 何かしらデータがある場合は、それを文字にして返す（原因究明用）
        return '解析に失敗しました。生データ: ' . json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}