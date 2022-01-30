<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ReportController::class,'viewReport']);



Route::get('export/playerstats/byteam/{code}/{format?}', [ExportController::class,'statsTeam']);
Route::get('export/playerstats/byposition/{pos}/{format?}', [ExportController::class,'statsPos']);
Route::get('export/playerstats/byplayer/{name}/{format?}', [ExportController::class,'statsPlayer']);
Route::get('export/players/byplayer/{name}/{format?}', [ExportController::class,'playerPlayer']);
Route::get('export/players/byteam/{code}/{format?}', [ExportController::class,'playerTeam']);
