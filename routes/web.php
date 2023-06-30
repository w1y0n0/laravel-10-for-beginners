<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // fetch all users
    // $users = DB::select("select * from users");
    // $users = DB::table('users')->where('id', 1)->get();
    $users = DB::table('users')->get();

    // create new user
    // $user = DB::insert('insert into users (name,email,password) values(?,?,?)', [
    //     'LabSI',
    //     'labsipnc@gmail.com',
    //     'password',
    // ]);
    // $user = DB::table('users')->insert([
    //     'name' => 'Labsi',
    //     'email' => 'labsi@gmail.com',
    //     'password' => 'password',
    // ]);

    // update user
    // $user = DB::update("update users set email=? where id=?", [
    //     'labsi@gmail.com',
    //     2,
    // ]);
    // $user = DB::table('users')->where('id', 4)->update(['email' => 'abc@gmail.com']);

    // delete user
    // $user = DB::delete('delete from users where id=2');
    // $user = DB::table('users')->where('id', 4)->delete();
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
