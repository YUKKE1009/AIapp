<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お店の味方 - AIバイト集客難易度診断</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-orange-50 text-slate-800 min-h-screen py-12 px-4">

    <div class="max-w-xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-900 flex items-center justify-center gap-2">
                <i class="fa-solid fa-chart-line text-orange-500"></i> AI バイト集客難易度診断
            </h1>
            <p class="text-slate-500 mt-2">お店の場所とこれまでの実績から、採用の難しさを判定します</p>
        </div>

        <form action="/applicant/analyze" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">お店の住所・最寄り駅</label>
                <input type="text" name="住所" required placeholder="東京都渋谷区宇田川町（渋谷駅 徒歩5分）" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none">
                <p class="text-xs text-slate-400 mt-1">※〇〇駅周辺、繁華街、ロードサイドなども書くとAIがより正確に判定します</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">募集したい職種・ターゲット</label>
                <input type="text" name="募集職種" required placeholder="居酒屋の深夜ホール（大学生・フリーター歓迎）" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">直近の応募実績・採用状況</label>
                <textarea name="実績" required rows="3" placeholder="先月求人サイトに2週間掲載した（費用5万円）。応募は2件あったが、面接のドタキャンが1件、条件不一致で採用は0人。" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">お店の条件（時給や特典など）</label>
                <textarea name="条件" required rows="2" placeholder="時給1,200円（深夜は1,500円）。美味しいまかない付き。髪型・髪色自由。" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none"></textarea>
            </div>

            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                <i class="fa-solid fa-wand-magic-sparkles"></i> AIに集客難易度を診断させる
            </button>
        </form>
    </div>

</body>
</html>