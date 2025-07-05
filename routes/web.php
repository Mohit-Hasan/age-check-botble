<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::post('age-check/submit', function () {
        if (request('confirm') === 'yes') {
            session(['is_18_or_over' => true]);
            return redirect()->back();
        }

        return redirect()->route('age.check.denied');
    })->name('age.check.submit');

    Route::get('age-check/denied', function () {
        return view('age-check::denied');
    })->name('age.check.denied');
});
