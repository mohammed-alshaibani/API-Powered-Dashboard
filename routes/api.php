<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\BannerApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;

/* This  Give me User Information*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* This  Give me Token*/
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->
get('/user/revoke',function(Request $request){
$user =$request->user();
$user->tokens()->delete();
return 'Tokens are Deleted';
});
 
Route::get('/Banners/{id}', [BannerApiController::class, 'show']);
Route::get('/Categories/All', [CategoryApiController::class, 'showAll']);
Route::get('/Products/Category/{Id}', [ProductApiController::class, 'showByCategory']);
Route::get('/Products/{Id}', [ProductApiController::class, 'show']);