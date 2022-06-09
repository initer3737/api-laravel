<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\controllers\apiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    #to get all data
Route::get('/',[apiController::class,'ApiIndex']);
    #to get data by id
Route::get('/{id}',[apiController::class,'ApiIndexId']);
    #to create data
Route::post('/post',[apiController::class,'ApiCreate']);
    #to update data
Route::put('/update/{id}/',[apiController::class,'ApiUpdate']);
    #to delete data
Route::delete('/delete/{id}',[apiController::class,'ApiDelete']);