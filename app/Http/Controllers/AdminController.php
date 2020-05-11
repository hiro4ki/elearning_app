<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryPost;
use App\Category;
use App\Question;
use App\Choice;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin/users', compact('categories'));
    }

    public function destroy_category($id)
    {
        $post = Category::findOrFail($id);
        $post->delete();

        return redirect(route("admin.users"));
    }

    public function add_category()
    {
        return view('admin/add_category');
    }

    public function edit_category($id)
    {
        $category = Category::findOrFail($id);

        return view('admin/edit_category', compact('category'));
    }

    public function category_store(StoreCategoryPost $request)
    {
        Category::create([
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return redirect(route("admin.users"));
    }

    public function update_category(StoreCategoryPost $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
            ]);
            
        return redirect(route("admin.users"));
    }

    public function edit_question()
    {
        return view("admin.edit_question");
    }

    public function add_question($id)
    {
        $category = Category::findOrFail($id);
        
        return view("admin.add_question", compact('category'));
    }

    public function question_store(Request $request)
    {
        $question = Question::create([
            "question" => $request->question,
            "category_id" => $request->id,
        ]);

        for ($i=1; $i <= 4; $i++) {
            $choice = "choice" . $i;
            $check = "check" . $i;
            if ($request->$check == "on") {
                $is_correct = true;
            } else {
                $is_correct = false;
            }
            Choice::create([
                "question_id" => $question->id,
                "choice" => $request->$choice,
                "is_correct" => $is_correct,
            ]);
        }
        
        return redirect(route("admin.users"));
    }
}
