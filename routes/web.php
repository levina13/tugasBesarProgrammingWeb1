<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\http\Controllers\authController;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\http\Requests\fogetPassRequest;
use App\Http\Requests\updatePassRequest;
use App\Models\User;

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

Route::get('/', [pageController::class, 'index'])->name('index');
Route::get('/logout', [authController::class, 'logout'])->name('logout');
Route::prefix('auth')->group(function(){
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::post('/auth', [authController::class, 'auth'])->name('auth');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/simpan', [AuthController::class, 'simpan'])->name('simpan');


    Route::get('/forgot-password', function () {
        return view('auth.forgetPass');
    })->name('password.request');
    Route::post('/forgot-password', function (fogetPassRequest $request) {
        
        $data = $request->validated();
        return view('auth.resetPass', ['email'=>$request['email']]);
    })->name('password.email');

    Route::post('/reset-password', function (updatePassRequest $request) {
        $user = User::where('email', $request['email'])->first();
        $user->password= Hash::make($request['password']);
        $user->save();

        return redirect()->route('login')->with('alert', [
            'type' => 'success',
            'message'   => __("berhasil reset password")
        ]);

        
    })->name('password.update');

});
