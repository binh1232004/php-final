<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\View\View;  


class CourseController extends Controller
{
    public function show(Course $course) : View {
        return view('course.show', ['course' => $course]);
    }
}
