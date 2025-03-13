<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController
{
    public function create(Comment $comment) {
        return view("comments.create", compact("comment"));
    }

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
        ]);
        return redirect("/posts/" . $validated["post_id"]);
    }

    public function edit(Comment $comment) {
        return view("comments/edit", compact("comment"));
    }

    public function update(Request $request, Comment $comment) {
        $validated = $request->validate([
            "name" => ["required", "max:25"],
            "comment" => ["required"],
            "post_id" => ["required"]
        ]);
        $comment->name = $validated["name"];
        $comment->comment = $validated["comment"];
        $comment->post_id = $validated["post_id"];
        $comment->save();
        return redirect("/comments");
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect("/comments");
    }
}
