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

Route::get('add', function () {

    return view('add');
});

Route::post('add', function () {
    
    $data = request(['name', 'amount', 'criteria', 'deadline', 'url']);

    \Illuminate\Support\Facades\Mail::to(users:'hliformsubmissions@gmail.com')
    ->send(new \App\Mail\ScholarshipSubmission($data));

    return redirect(to:'add')
    ->with('flash', 'Form Submitted Successfully');
});




