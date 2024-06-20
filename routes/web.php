<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewsController::class,'index'])
    -> name('site.index');

Route::get('/register', [ViewsController::class, 'register'])
    -> name('site.register')
    -> middleware('guest');

Route::post('/register', [ActionsController::class, 'register'])
    -> middleware('guest');

Route::get('/exit', [ActionsController::class,'logout'])
    ->name('site.logout')
    ->middleware('auth');

Route::get('/login', [ViewsController::class,'login'])
    ->name('site.login')
    ->middleware('guest');

Route::post('/login', [ActionsController::class,'login'])
    ->middleware('guest');

Route::get('/resume/create', [ViewsController::class,'create_resume'])
    ->name('resume.create')
    ->middleware('auth');

Route::post('/resume/create', [ActionsController::class,'create_resume'])
    ->middleware('auth');

Route::get('/resume/{resumeID}', [ViewsController::class,'resume_site'])
    ->middleware('auth')
    ->name('resume.site');

Route::post('/resume/{resumeID}/like', [ActionsController::class, 'add_like'])
    ->middleware('auth')
    ->name('resume.like');

Route::post('/resume/{resume_id}/comment', [ActionsController::class, 'add_comment'])
    ->middleware('auth')
    ->name('resume.comment');
