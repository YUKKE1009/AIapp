<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function analyze(Request $request, GeminiService $gemini)
    {
        // 1. フォームの入力値（住所、職種、実績、条件）を取得
        $shopData = $request->only(['住所', '募集職種', '実績', '条件']);

        // 2. 🤖 Geminiへのプロンプト（集客難易度コンサルタントに変身）
        $prompt = "あなたは飲食業界に特化した、データ分析が得意なプロの採用コンサルタントです。\n"
            . "以下のお店データと実績を元に、このお店がターゲットを「集客・採用する難易度」を100点満点（10点：超イージー 〜 100点：絶望的に難しい）で評価し、診断レポートを作成してください。\n\n"
            . "【判定基準のヒント】\n"
            . "・住所やエリアの競合環境（周辺に求人が多そうか、人口はどうか）\n"
            . "・直近の実績に対する、条件（時給やまかない）の妥当性\n\n"
            . "【店舗・求人データ】\n"
            . json_encode($shopData, JSON_UNESCAPED_UNICODE) . "\n\n"
            . "以上の内容から、以下の構成で分かりやすく日本語で出力してください。\n"
            . "1. 【集客難易度スコア】（〇〇点 / 100点）\n"
            . "2. 【難易度が高い原因・背景の分析】（エリア特性や実績から見える課題）\n"
            . "3. 【今すぐできる具体的な改善アドバイス】（時給、求人原稿の書き方、アピールの変え方など）";

        // 3. API通信で解析結果を取得
        $result = $gemini->analyze($prompt);

        // 4.shopDataをそのまま丸ごとBladeに引き渡す！
        return view('analyze', [
            'shopData' => $shopData,
            'result' => $result
        ]);
    }
}