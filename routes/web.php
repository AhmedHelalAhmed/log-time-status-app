<?php

use App\Jobs\LogToFile;
use Illuminate\Support\Facades\Redis;
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

// redis
//..
Route::get('/test-redis-cache', function () {
    Redis::set('name', 'Ahmed Helal');
    dd(Redis::get('name'));
});

// database
//..
Route::get('/test-database', function () {
    if(!\App\Models\User::count()){
        \App\Models\User::factory()->create();
    }
    dd(\App\Models\User::first()->toArray());
});

// redis as queue driver
//..
Route::get('/test-redis-queue', function () {
    dispatch(new LogToFile);
    $queueName = 'default';
    dd(
        'Event dispatched',
        Redis::keys('*'),
        Redis::llen('queues:' . $queueName)
    );
});
