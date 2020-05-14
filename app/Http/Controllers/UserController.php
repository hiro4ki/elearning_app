<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class UserController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('normal_user.categories', compact('categories'));
    }
}
