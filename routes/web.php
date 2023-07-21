<?php
use App\Models\Scholarship;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::get('/', function () {
    $scholarships = Scholarship::all();

    return view('scholarships', [
        'scholarships' => $scholarships

    ]);
});

Route::get('scholarships/{scholarship}', function($id) {

    return view('scholarship', [
        'scholarship' => Scholarship::findOrFail($id)
    ]);

})->where('scholarship', '[0-9]+');



