<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('scholarships');
});

Route::get('scholarships/{scholarship}', function($slug) {

if (! file_exists($path = __DIR__ . "/../resources/scholarships/{$slug}.html")){
        return redirect('/');
    }

    $scholarship = cache()->remember("scholarships.{slug}", 1200, fn () => file_get_contents($path));

    return view('scholarship', ['scholarship' => $scholarship]);
})->where('scholarship', '[A-z_\-]+');



