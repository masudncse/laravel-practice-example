<?php

use App\Events\WelcomeEvent;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Mail\WelcomeMail;
use App\Models\Post;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email', function () {
    Mail::to('masud.ncse@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

Route::get('/notify', function () {
    $user = User::orderBy('id', 'DESC')->first();
    $user->notify(new WelcomeNotification());

    return new WelcomeMail();
});

Route::get('/event', function () {
    $user = User::orderBy('id', 'DESC')->first();

    event(new WelcomeEvent($user));

    return new WelcomeMail();
});

Route::get('/test', function () {
    $gret = new \MrkPackages\TodoList\Todo();
    return $gret->greeting();


    // $posts = Post::with(['user', 'comments'])->paginate(50);
    $posts = Cache::remember('posts', $minutes = '60', function () {
        return Post::with(['user', 'comments'])->paginate(2);
    });

    return view('test', compact('posts'));
});

Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts', PostController::class);

require __DIR__ . '/auth.php';
