<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\ApiController;
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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::group(['prefix'=>'blog'], function(){
    Route::get('/all_articles', [ ApiController::class, 'all_articles']);
    Route::get('/all_articles_by_author/{author}', [ ApiController::class, 'all_articles_by_author']);
    Route::get('/get_article_by_category/{cat_id}', [ApiController::class, 'get_article_by_category']);
    Route::get('/get_article/{slug}',[ApiController::class, 'get_article_by_slug']);
    Route::post('/create_article', [ApiController::class, 'create_article']);
    Route::patch('/update_article/{id}', [ApiController::class, 'update_article']);
    Route::delete('/delete_article/{id}', [ApiController::class, 'delete_article']);
    
    
});

//Route::get('/all_articles', [ ApiController::class, 'all_articles']);
