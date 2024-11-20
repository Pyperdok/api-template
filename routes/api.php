<?php

use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [CommonController::class, 'register']);