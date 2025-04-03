<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController
{
    public function store(Request $request) {
        $validated = $request->validate([
            "name" => ["required", "max:25"],
            "comment" => ["required"],
            "post_id" => ["required"]
        ]);
        Comment::create([
            "name" => $validated["name"],
            "comment" => $validated["comment"],
            "post_id" => $validated["post_id"],
            "user_id" => Auth::user()->id
        ]);
        return redirect("/posts");
    }

    public function edit(Comment $comment) {
        return view("comments/edit", compact("comment"));
    }

    public function update(Request $request, Comment $comment) {
        $validated = $request->validate([
            "comment" => ["required"]
        ]);
        $comment->comment = $validated["comment"];
        $comment->save();
        return redirect("/posts");;
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect("/posts");
    }
}
