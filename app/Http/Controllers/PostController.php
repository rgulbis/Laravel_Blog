<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController
{
    public function index(Request $request) {
        $categorys = Category::all();
        $searchQuery = $request->query("query");
        $categoryQuery = $request->query("query-category");

        $posts = Post::query()
        ->when($searchQuery, fn ($query) => 
            $query->where('content', 'like', "%{$searchQuery}%")
        )
        ->when($categoryQuery, fn ($query) => 
        $query->where('category_id', $categoryQuery)
        )
        ->get();

        $categoryTag = $categoryQuery 
        ? Category::where('id', $categoryQuery)->value('category_name') 
        : null;

        return view("posts.index", compact("posts", "categorys", "searchQuery", "categoryQuery", "categoryTag"));
    }

    public function show(Post $post) {
        return view("posts.show", compact("post"));
    }

    public function create(Post $post) {
        $categorys = Category::all();
        return view("posts.create", compact("post", "categorys"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "category_id" => [],
        ]);          
        Post::create([
            "content" => $validated["content"],
            "category_id" => $validated["category_id"],
            "user_id" => Auth::user()->id
        ]);
        return redirect("/posts");
    }

    public function edit(Post $post) {
        $categorys = Category::all();
        return view("posts/edit", compact("post", "categorys"));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "category_id" => []
        ]);
        $post->content = $validated["content"];
        $post->category_id = $validated["category_id"];
        $post->save();
        return redirect("/posts");
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect("/posts");
    }
}
