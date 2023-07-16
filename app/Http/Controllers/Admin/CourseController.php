<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest('id')->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('title', 'id')->get();
        $instructors = Instructor::select('name', 'id')->get();

        return view('admin.courses.create', compact('categories', 'instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'price' => 'required',
            'duration' => 'required',
            'content' => 'required',
            'instructor_id' => 'required',
            'category_id' => 'required',
        ]);


        $courseimage = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $courseimage);


        Course::create([
            'title' => $request->title,
            'price' => $request->price,
            'duration' => $request->duration,
            'content' => $request->content,
            'instructor_id' => $request->instructor_id,
            'category_id' => $request->category_id,
            'image' => $courseimage
        ]);


        return redirect()
        ->route('admin.courses.index')
        ->with('msg', 'Course added successfully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::select('title', 'id')->get();
        $instructors = Instructor::select('name', 'id')->get();
        $course = Course::findOrFail($id);

        return view('admin.courses.edit', compact('categories', 'instructors', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'price' => 'required',
            'duration' => 'required',
            'content' => 'required',
            'instructor_id' => 'required',
            'category_id' => 'required',
        ]);

        $course = Course::findOrFail($id);

        $courseimage = $course->image;
        if($request->hasFile('image')) {

            $courseimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $courseimage);
        }


        $course->update([
            'title' => $request->title,
            'price' => $request->price,
            'duration' => $request->duration,
            'content' => $request->content,
            'instructor_id' => $request->instructor_id,
            'category_id' => $request->category_id,
            'image' => $courseimage
        ]);


        return redirect()
        ->route('admin.courses.index')
        ->with('msg', 'Course updated successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Course::destroy($id);

        return redirect()
        ->route('admin.courses.index')
        ->with('msg', 'course deleted successfully')
        ->with('type', 'danger');
    }
}
