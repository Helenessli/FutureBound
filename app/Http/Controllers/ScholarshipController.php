<?php

namespace App\Http\Controllers;
use App\Models\Scholarship;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {

        $search = request()->query('search');
        if ($search){
            $scholarships = Scholarship::where('title', 'LIKE', "%{$search}%");
        }
        else{
            $scholarships = Scholarship::simplePaginate(20);
        }
        return view('scholarships')
            ->with('scholarships', $scholarships);
    }
}
