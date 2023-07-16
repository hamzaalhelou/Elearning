<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->get();
        $courses = Course::latest('id')->get();
        $instructors = Instructor::latest('id')->get();
        $testimonials = Testimonial::latest('id')->get();
        return view('site.index',compact('testimonials','instructors','courses','categories'));
    }

    public function about()
    {
        $instructors = Instructor::latest('id')->get();
        return view('site.about',compact('instructors'));
    }

    public function courses()
    {
        $testimonials = Testimonial::latest('id')->get();
        $courses = Course::latest('id')->get();
        return view('site.courses',compact('courses','testimonials'));
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('site.course',compact('course'));
    }
}
