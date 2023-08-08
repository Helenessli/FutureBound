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
    
    public function filterdeadline(Request $request){
        $start_deadline = $request->start_deadline;
        $end_deadline = $request->end_deadline;

        $scholarships = Scholarship::whereDate('deadline','>=', $start_deadline)
                                    ->whereDate('deadline', '<=', $end_deadline)
                                    ->get();
                                
        return view('scholarships', compact('scholarships'));
    }
}
