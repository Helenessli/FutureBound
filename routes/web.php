<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('scholarships');
});

Route::get('scholarships/{scholarship}', function($slug) {
    $path = __DIR__ . "/../resources/scholarships/{$slug}.html";

    if (! file_exists($path)){
        return redirect('/');
    }

    $post = file_get_contents($path);

    return view('scholarship', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');



