<?php
use App\Models\Scholarship;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('scholarships');
});

Route::get('scholarships/{scholarship}', function($slug) {
    /*$scholarship = Scholarship::find($slug);

    return view('scholarship', [
        'scholarship' => $scholarship
    ]);*/

if (! file_exists($path = __DIR__ . "/../resources/scholarships/{$slug}.html")){
        return redirect('/');
    }

    $scholarship = cache()->remember("scholarships.{$slug}", 1200, fn () => file_get_contents($path));

    return view('scholarship', ['scholarship' => $scholarship]);
})->where('scholarship', '[a-z_\-0-9A-Z]+');



