<?php
use App\Models\Scholarship;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/', function () {
    $scholarships = Scholarship::alll();

    return view('scholarships', [
        'scholarships' => $scholarships

    ]);
});

Route::get('scholarships/{scholarship}', function($slug) {

    return view('scholarship', [
        'scholarship' => Scholarship::find($slug)
    ]);

})->where('scholarship', '[a-z_\-0-9A-Z]+');



