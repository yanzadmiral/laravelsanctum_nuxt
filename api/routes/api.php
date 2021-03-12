<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\User;    
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
Route::middleware('auth:sanctum')->get('/cekuser', function (Request $request) {
    return $request->user();
});


Route::get('registermanual',function (Request $request) {
    $user = User::create([
        'name' => 'yayan cahyani',
        'email' => 'yayanchy2@gmail.com',
        'password' => bcrypt('12345678')
    ]);
    return $user;
});



Route::get('register',function (Request $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);
    return $user;
});


Route::post('login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if(! auth()->attempt($credentials)){
        throw ValidationException::withMessages([
            'email' => 'Invalid credentials'
        ]);
    }
    //$request->user->createToken('token-name', ['server:update'])->plainTextToken;
    $request->session()->regenerate();

    return response()->json(null, 201);
});


Route::post('logout', function (Request $request) {

    auth()->guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return response()->json(null,200);
});