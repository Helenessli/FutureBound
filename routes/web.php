<?php
use App\Models\Tag;
use App\Models\Scholarship;
use App\Models\scholarship_tag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

//Route for displaying the home scholarships page
Route::get('/', function () {
    $scholarships = Scholarship::all();
    $tags = Tag::all();
    $scholarship_tag = scholarship_tag::all();
    return view('scholarships', [
        'scholarships' => $scholarships,
        'tags' => $tags,
        'scholarship_tag' => $scholarship_tag
    ]);
})->name('scholarships');

// Route for handling the search functionality
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships');

//Route for displaying the single specific scholarships
Route::get('scholarships/{scholarship}', function($id) {

    return view('scholarship', [
        'scholarship' => Scholarship::findOrFail($id)
    ]);

})->where('scholarship', '[0-9]+');

//Route for handling going to the add page
Route::get('add', function () {

    return view('add');
});

//Route for handling submitting the form in the add page
Route::post('add', function () {
    
    $data = request(['name', 'amount', 'criteria', 'deadline', 'url']);

    \Illuminate\Support\Facades\Mail::to(users:'hliformsubmissions@gmail.com')
    ->send(new \App\Mail\ScholarshipSubmission($data));

    return redirect(to:'add')
    ->with('flash', 'Form Submitted Successfully. The submission is under review.');
});

//Route for filtering deadlines
Route::get('/filterdeadline', [ScholarshipController::class, 'filterdeadline']);


