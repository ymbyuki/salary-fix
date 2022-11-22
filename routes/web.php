<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートと登録します。
| これらの ルートは、"web "ミドルウェア・グループを含むグループ内のRouteServiceProviderによってロードされます。
|
*/

Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(); // 認証用
Route::get('/', function () {return view('welcome');}); //TOPページ


// 認証後ルーティング
Route::group(['middleware' => 'auth'], function () {
    Route::get('/{any}', function () {return view('app');})->where('any','.*'); // Vue.jsの historyモード用（これ以下に書いたものは全てvue.jsのrouter.jsで制御されるため、アクセスをさせたい場合はこれより上に記載する。
    Route::get('/home', function () {return view('app'); }); //Vue.jsロードファイル
  });