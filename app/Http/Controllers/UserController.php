<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfile;
use App\Category;
use App\Lesson;
use App\User;
use App\Choice;
use App\Answer;
use App\Relationship;

class UserController extends Controller
{
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

    public function user_list()
    {
        $users = User::all();
        return view('normal_user/user_list', compact('users'));
    }

    public function follow($id)
    {
        $followed_user = User::find($id);
        auth()->user()->followings()->attach($followed_user);

        return back();
    }

    public function unfollow($id)
    {
        $followed_user = User::find($id);
        auth()->user()->followings()->detach($followed_user);

        return back();
    }

    public function mypage()
    {
        return view('normal_user.mypage');
    }

    public function following_users($id)
    {
        $user = User::findOrFail($id);
        $followings = $user->followings()->get();

        return view("normal_user.followings", compact("followings", "user"));
    }

    public function follower_users($id)
    {
        $user = User::findOrFail($id);
        $followers = $user->followers()->get();

        return view("normal_user.followers", compact("followers", "user"));
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        // words user learned
        $completed_lessons = $user->lessons->where('completed', true)->groupBy('category_id');
        $ids = array();
        $l_lessons = array();
        foreach ($completed_lessons as $lesson) {
            $ids[] = $lesson->max('id');
            $l_lessons[] = $lesson[$lesson->count() - 1];
        }
        $sum = 0;
        foreach ($l_lessons as $lesson) {
            $sum += $lesson->answers->count();
        }

        return view('normal_user.profile', compact('user', 'sum'));
    }
    
    public function edit_profile()
    {
        return view('normal_user.edit_profile');
    }

    public function update_profile(UpdateProfile $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        if ($request->photo) {
            $path = Storage::disk('s3')->putFileAs('/profile_images', $request->photo, auth()->user()->id . '.jpg', 'public');
            $user->image = Storage::disk('s3')->url($path);
            $user->save();
        }

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user.mypage');
    }

    public function words_learned($id)
    {
        $user = User::findOrFail($id);
        // get completed lessons
        $all_lessons = $user->lessons->where('completed', true)->groupBy('category_id');

        // insert the newest lessons of each category to array
        $lessons = array();
        foreach ($all_lessons as $lesson) {
            $lessons[] = $lesson[$lesson->count() - 1];
        }

        // count all answers
        $sum = 0;
        foreach ($lessons as $lesson) {
            $sum += $lesson->answers->count();
        }

        return view('normal_user.words_learned', compact('user', 'lessons', 'sum'));
    }

    public function dashboard()
    {
        $relationships = Relationship::where('follower_id', auth()->user()->id)->orWhere('followed_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        // auth user's lessons
        // count all learned words
        $completed_lessons = auth()->user()->lessons->where('completed', true)->groupBy('category_id');
        $ids = array();
        $l_lessons = array();
        foreach ($completed_lessons as $lesson) {
            $ids[] = $lesson->max('id');
            $l_lessons[] = $lesson[$lesson->count() - 1];
        }
        $sum = 0;
        foreach ($l_lessons as $lesson) {
            $sum += $lesson->answers->count();
        }

        // lessons that all users followed by auth user
        $users = auth()->user()->followings;
        foreach ($users as $user) {
            foreach ($user->lessons->where('completed', true)->groupBy('category_id') as $lesson) {
                $ids[] = $lesson->max('id');
            }
        }
        
        rsort($ids);
        $lessons = array();
        foreach ($ids as $id) {
            $lessons[] = Lesson::find($id);
        }

        return view('normal_user.dashboard', compact('sum', 'lessons', 'relationships'));
    }
}
