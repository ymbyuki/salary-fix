<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| 認証前ルーティング
|--------------------------------------------------------------------------
*/
Auth::routes(); // 認証用
Route::get('/', function () {return view('welcome');}); //TOPページ

/*
|--------------------------------------------------------------------------
| 認証後ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
  /*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  */
  Route::prefix('api')->group(function () {
    Route::get('/initIndexPage', [App\Http\Controllers\SalaryApiController::class, 'initIndexPage']); //本年度の全てのデータ取得
    Route::get('/getYearAllSalary', [App\Http\Controllers\SalaryApiController::class, 'getYearAllSalary']); //本年度の全てのデータ取得
    Route::get('/getThisMonthSalary', [App\Http\Controllers\SalaryApiController::class, 'getThisMonthSalary']); //今月の全データ
    Route::get('/getSalary/{id}', [App\Http\Controllers\SalaryApiController::class, 'getSalary']); //個別詳細
    Route::get('/totalCost', [App\Http\Controllers\SalaryApiController::class, 'totalCost']); //今年の合計
    Route::get('/totalThisMonthCost', [App\Http\Controllers\SalaryApiController::class, 'totalThisMonthCost']); //今年の合計
    Route::get('/getAllSalary', [App\Http\Controllers\SalaryApiController::class, 'getAllSalary']); //全データ取得
  });
  /*
  |--------------------------------------------------------------------------
  | WEB Routes
  |--------------------------------------------------------------------------
  */
  Route::get('/{any}', function () {return view('app');})->where('any', '.*'); // Vue.jsの historyモード用（これ以下に書いたものは全てvue.jsのrouter.jsで制御されるため、アクセスをさせたい場合はこれより上に記載する。
});
