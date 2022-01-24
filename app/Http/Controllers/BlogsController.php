<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }
    public function index()
    {
        $recipes = Recipe::latest('updated_at')->published()->paginate(9);
        return view('blogs.index', compact(['recipes']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $recipe = Recipe::where('id','=', $id)->first();
        return view('blogs.show', compact(['recipe']));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function like($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->increment('likes');

        $recipe->save();

        return $recipe->likes;
    }

    public function dislike($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->decrement('likes');

        $recipe->save();

        return $recipe->likes;
    }
    public function comment(Request $request, $id) {
        $recipe = Recipe::findOrFail($id);
        $rules = [
            'description' => 'required|max:120'
        ];
        $this->validate($request, $rules);
        $recipe->comments()->create([
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);

    }
    public function getComments($id)
    {
        $comments = Comment::where('recipe_id', $id)->get();
        $data = [];
        $data['comments'] = $comments;
        return JsonResponse::fromJsonString(json_encode($data));

    }
}
