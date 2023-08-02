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
            $scholarships = Scholarship::where('name', 'LIKE', "%{$search}%")->simplePaginate(10);
        }
        else{
            $scholarships = Scholarship::simplePaginate(10);
        }
        
        return view('scholarships', ['scholarships' => $scholarships])
            ->with('scholarships', $scholarships);
    }
}
