<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\P1control;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/pertemuan1', function () {
    return view('pertemuan1');
});

Route::get('/basic', function () {
    return view('pertemuan1.basic');
});

Route::fallback(function () {
    return response()->view('pertemuan1.fallback', [], 404);
});

Route::prefix('/parameter')->group(function(){
    Route::get('/par', function (Illuminate\Http\Request $request) {
        $par1 = $request->input('par1');
        $par2 = $request->input('par2');
        
        if ($par1 && $par2) {
            return redirect()->route('par2', ['par1' => $par1, 'par2' => $par2]);
        } elseif ($par1) {
            return redirect()->route('par1', ['par1' => $par1]);
        } else {
            return view('pertemuan1.param');
        }
    })->name('param');
    
    Route::get('/par/{par1}', function ($par1) {
        return view('pertemuan1.param', ['par1' => $par1]);
    })->name('par1');
    
    Route::get('/par/{par1}/{par2}', function ($par1, $par2) {
        return view('pertemuan1.param', ['par1' => $par1, 'par2' => $par2]);
    })->name('par2');
});

Route::get('/named', function () {
    return view('pertemuan1.named');
})->name('nama');

Route::prefix('group')->group(function () {
    Route::get('/', function () {
        return view('pertemuan1.group');
    })->name('grup');

    Route::get('/page1', function () {
        return view('pertemuan1.page1');
    })->name('page1');

    Route::get('/page2', function () {
        return view('pertemuan1.page2');
    })->name('page2');

    Route::get('/page3', function () {
        return view('pertemuan1.page3');
    })->name('page3');
});

Route::get('/ganjilgenap', [P1control::class, 'ganjilGenap']);

Route::get('/fibonacci', [P1control::class, 'fibonacci']);

Route::get('/prima', [P1control::class, 'prima']);