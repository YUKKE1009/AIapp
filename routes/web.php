<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;

// 1. 入力フォーム画面を開くURL (GET)
Route::get('/applicant/form', [ApplicantController::class, 'index']);

// 2. フォームの送信ボタンを押したときのURL (POST)
Route::post('/applicant/analyze', [ApplicantController::class, 'analyze']);