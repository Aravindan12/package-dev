<?php

use Illuminate\Support\Facades\Route;
use Sparkout\AdminDashboard\App\Http\Controllers\CheckController;

Route::get('/test', [CheckController::class,'test']);