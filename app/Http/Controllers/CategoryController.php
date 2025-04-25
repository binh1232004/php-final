<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $courses = Course::all();

        return view('categories.index', compact('categories', 'courses'));
    }

    public function show(Category $category)
    {
        $courses = $category->courses;
        $categories = Category::all();

        return view('categories.show', compact('category', 'courses', 'categories'));
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $selectedCategories = $request->input('categories', []);

        // Nếu chọn "Tất cả" hoặc không chọn gì, hiển thị toàn bộ khóa học
        if (empty($selectedCategories) || in_array("", $selectedCategories)) {
            $courses = Course::all();
            $selectedCategories = []; // Đảm bảo danh sách chọn rỗng để giữ trạng thái checkbox "Tất cả"
        } else {
            $courses = Course::whereIn('category_id', $selectedCategories)->get();
        }

        return view('categories.index', compact('categories', 'courses', 'selectedCategories'));
    }
}
