<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| ライブラリルーティング
|--------------------------------------------------------------------------
*/

Auth::routes(); // 認証用

/*
|--------------------------------------------------------------------------
| 認証前ルーティング
| ここには認証をしなくても入れるページを入力
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
  return view('welcome');
}); //TOPページ

/*
|--------------------------------------------------------------------------
| 認証後ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
  /*
  |------------------------------------------------------------------------
  | API Routes
  |------------------------------------------------------------------------
  */
  Route::prefix('api')->group(function () {
    /* CREATE */
    Route::post('/store', [App\Http\Controllers\SalaryApiController::class, 'store']); //データの新規作成
    /* READ */
    Route::post('/initIndexPage', [App\Http\Controllers\SalaryApiController::class, 'initIndexPage']); //ページ初期化
    Route::post('/getYearAllSalary', [App\Http\Controllers\SalaryApiController::class, 'getYearAllSalary']); //本年度の全てのデータ取得
    // Route::get('/getThisMonthSalary', [App\Http\Controllers\SalaryApiController::class, 'getThisMonthSalary']); //今月の全データ
    Route::post('/getSalary', [App\Http\Controllers\SalaryApiController::class, 'getSalary']); //個別詳細
    Route::get('/getAllSalary', [App\Http\Controllers\SalaryApiController::class, 'getAllSalary']); //全データ取得
    Route::post('/selectBankList', [App\Http\Controllers\SalaryApiController::class, 'selectBankList']); //全データ取得
    Route::post('/selectWorkplacekList', [App\Http\Controllers\SalaryApiController::class, 'selectWorkplacekList']); //全データ取得

    /* UPDATE */
    Route::post('/update', [App\Http\Controllers\SalaryApiController::class, 'update']); //データのアップデート

    /* DELETE */
    Route::post('/delete', [App\Http\Controllers\SalaryApiController::class, 'delete']); //データの削除

  });
  /*
  |------------------------------------------------------------------------
  | WEB Routes
  |------------------------------------------------------------------------
  */
  Route::get('/{any}', function () {
    return view('app');
  })->where('any', '.*'); // Vue.jsの historyモード用（これ以下に書いたものは全てvue.jsのrouter.jsで制御されるため、アクセスをさせたい場合はこれより上に記載する。
});
