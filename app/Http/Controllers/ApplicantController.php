<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // 💡 これを忘れずインポート
use App\Services\GeminiService;

class ApplicantController extends Controller
{
    public function analyze(Request $request, GeminiService $gemini)
    {
        // テスト用のダミー応募者データ
        $applicant = [
            '名前' => '山田太郎',
            '年齢' => 28,
            '経験' => 'PHP 3年、Laravel 2年',
            '志望動機' => 'スキルアップしたい',
        ];

        // Geminiに送る指示文（プロンプト）の作成
        $prompt = "以下の応募者を100点満点で評価し、採用可否を判断してください。\n\n"
            . json_encode($applicant, JSON_UNESCAPED_UNICODE);

        // 作成したサービスを使ってGeminiの解析結果を取得
        $result = $gemini->analyze($prompt);

        // 結果をブラウザにJSON形式で綺麗に出力
        return response()->json(
            ['result' => $result],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}