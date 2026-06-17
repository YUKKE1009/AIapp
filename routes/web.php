<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;

// ブラウザから簡単に確認できるように一時的に GET にしています
Route::get('/applicant/analyze', [ApplicantController::class, 'analyze']);
