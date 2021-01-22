<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;


Route::get('/home', function () { return view('pages.home');  })->name('home'); 
Route::get('/'    , function () { return view('pages.home');  })->name('home'); 

/* -------------------------------------- User group routes ------------------------------------------- */
Route::prefix('user')->group(function(){

    Route::get ('/'         ,[UserController::class, 'index'    ])->name('profile') ->middleware('auth');    

    Route::get ('/register' ,[UserController::class, 'register' ])->name('register')->middleware('guest');
    Route::post('/register' ,[UserController::class, 'register' ]);

    Route::get ('/login'    ,[UserController::class, 'login'    ])->name('login')   ->middleware('guest');
    Route::post('/login'    ,[UserController::class, 'login'    ]);

    Route::get ('/logout'   ,[UserController::class, 'logout'   ])->name('logout')  ->middleware('auth');

});

/* -------------------------------------- event group routes ------------------------------------------- */
Route::prefix('event')->group(function(){

    
    Route::get ('/create',[EventController::class, 'create'  ])->name('new-event') ->middleware('auth');
    Route::post('/create',[EventController::class, 'create'  ])->name('new-event');
    
    Route::get ('/{event}'  ,[EventController::class, 'index'   ])->name('event')     ->middleware('auth');

    /* ---------------------------------- channel sub-group routes -------------------------------------- */
    Route::prefix('channel')->group(function (){
    });

});
