<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthAPIController;
use App\Http\Controllers\Api\IncomeAPIController;
use App\Http\Controllers\Api\SpendingAPIController;
use App\Http\Controllers\Ordering\Utama;
use App\Models\M_Barang;

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


Route::post('/pushData',[Utama::class,'store']);

Route::post('cobaPost',function (Request $request){
    $file = $request->file('file');
    $tujuan_upload = 'data_file';
    if($file->move($tujuan_upload)){
        $data = M_Barang::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga
        ]);
        return response()->json([
           'message' => 'Success',
           'data' => $data
        ]);
    }

    return response()->json([
        'message' => 'Failed'
    ]);
});


Route::post('/register',[AuthAPIController::class,'register']);
Route::post('/login_token', [AuthAPIController::class, 'login_token']);
Route::post('/proses_login_api',[AuthAPIController::class,'proses_login_api']);

Route::get('/incomes/paginate', [IncomeAPIController::class, 'paginate']);
Route::get('/spendings/paginate', [SpendingAPIController::class, 'paginate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function (){
    
    Route::get('/incomes', [IncomeAPIController::class, 'index']);
    Route::get('/incomes/{id}', [IncomeAPIController::class, 'show']);
    Route::get('/spendings', [SpendingAPIController::class, 'index']);
    Route::get('/spendings/{id}', [SpendingAPIController::class, 'show']);
    Route::post('/logout', [AuthAPIController::class, 'logout']);
});







