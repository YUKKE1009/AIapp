<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI求人集客難易度診断レポート</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-orange-50/50 text-slate-800 min-h-screen py-12 px-4"> <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-slate-900 flex items-center justify-center gap-2">
                <i class="fa-solid fa-chart-line text-orange-500"></i> AI 求人集客難易度診断
            </h1>
            <p class="text-slate-500 mt-2">Gemini 2.5 Flash による採用市場・エリア特性の高度な解析結果</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 mb-6">
            <h2 class="text-xs font-bold uppercase tracking-wider text-orange-500 mb-3">診断対象の求人データ</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <span class="block text-sm text-slate-400 font-medium">募集職種</span>
                    <span class="font-bold text-base text-slate-800 block truncate" title="{{ $shopData['募集職種'] }}">{{ $shopData['募集職種'] }}</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-400 font-medium">住所・最寄り駅</span>
                    <span class="font-bold text-base text-slate-800 block truncate" title="{{ $shopData['住所'] }}">{{ $shopData['住所'] }}</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-400 font-medium">お店の条件</span>
                    <span class="font-bold text-sm text-slate-800 block truncate" title="{{ $shopData['条件'] }}">{{ $shopData['条件'] }}</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-400 font-medium">直近の実績</span>
                    <span class="font-bold text-sm text-slate-800 block truncate" title="{{ $shopData['実績'] }}">{{ $shopData['実績'] }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <div class="flex items-center gap-2 pb-4 mb-6 border-b border-slate-100">
                <i class="fa-solid fa-square-poll-horizontal text-xl text-orange-500"></i>
                <h3 class="text-xl font-bold text-slate-800">診断フィードバック・改善案</h3>
            </div>

            <div class="prose max-w-none text-slate-700 leading-relaxed whitespace-pre-wrap text-base">
                {{ $result }}
            </div>
        </div>

        <div class="text-center mt-8 space-y-2">
            <a href="/applicant/form" class="inline-flex items-center gap-2 text-sm font-medium text-orange-600 hover:text-orange-700 transition">
                <i class="fa-solid fa-arrow-left"></i> 条件を変えて再診断する
            </a>
            <p class="text-xs text-slate-400">AIapp v1.0 | CoachTech Assignment</p>
        </div>
    </div>

</body>
</html>