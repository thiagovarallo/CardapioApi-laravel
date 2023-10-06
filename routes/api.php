<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/cardapio', 'App\Http\Controllers\CardapioController');
Route::apiResource('/usuario', 'App\Http\Controllers\UserController');