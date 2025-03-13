<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index() {
        $categorys = Category::all();
        return view("categorys.index", compact("categorys"));
    }

    public function show(Category $category) {
        return view("categorys.show", compact("category"));
    }

    public function create(Category $category) {
        return view("categorys.create", compact("category"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "category_name" => ["required", "max:255"]
        ]);          
        Category::create([
            "category_name" => $validated["category_name"],
        ]);
        return redirect("/categorys");
    }

    public function edit(Category $category) {
        return view("categorys/edit", compact("category"));
    }

    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            "category_name" => ["required", "max:255"]
        ]);
        $category->category_name = $validated["category_name"];
        $category->save();
        return redirect("/categorys");
    } 

    public function destroy(Category $category) {
        $category->delete();
        return redirect("/categorys");
    }
}
