<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {

        $scholarships = Scholarship::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->when(request('tags', false), function ($query, $tags) {
                $query->whereHas('tags', function ($query) {
                    $query->whereIn('tags.id', array_values(request('tags', [])));
                });
            })
            ->when(request('start_deadline'), function ($query, $date) {
                $query->whereDate('deadline', '>=', $date);
            })
            ->when(request('end_deadline'), function ($query, $date) {
                $query->whereDate('deadline', '<=', $date);
            })
            ->paginate(5);

        $tags = Tag::all();

        return view('scholarships', [
            'scholarships' => $scholarships,
            'tags' => $tags
        ]);
    }
}
