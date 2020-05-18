<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Lesson;
use App\User;
use App\Choice;
use App\Answer;

class UserController extends Controller
{
    public function home()
    {
        return view('normal_user.home');
    }

    public function categories($id)
    {
        $user = User::findOrFail($id);
        $categories = Category::all();
        return view('normal_user.categories', compact('categories', 'user'));
    }

    public function create_lesson(Request $request)
    {
        $lesson = Lesson::create([
            "user_id" => $request->user_id,
            "category_id" => $request->category_id,
        ]);

        return redirect()->route(
            'user.lesson_answer',
            [
            'lesson' => $lesson->id,
            'page' => 1,
            ]
        );
    }

    public function lesson_answer(Lesson $lesson, Request $request)
    {
        $category = Category::findOrFail($lesson->category_id);
        // paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
        $questions = $category->questions()->paginate(1, $columns = ['*'], 'page', $request->page);
        
        // 次のページがあるかどうか
        if ($request->page <= $questions->total()) {
            return view('normal_user.lesson_answer', compact('category', 'questions'));
        } else {
            $lesson->update([
                'completed' => 1,
            ]);
            return redirect()->route('user.lesson_result', ['lesson' => $lesson->id]);
        }
    }

    public function store_answer(Choice $choice, Request $request)
    {
        // dd($request->page);
        $lesson_id = $choice->which_lesson();
        Answer::create([
            "choice_id" => $choice->id,
            "lesson_id" => $lesson_id,
        ]);

        return redirect()->route('user.lesson_answer', ['lesson' => $lesson_id, 'page' => $request->page+1]);
    }

    public function lesson_result(Lesson $lesson)
    {
        $category = Category::findOrFail($lesson->category_id);
        return view('normal_user.lesson_result', compact('lesson', 'category'));
    }
}
