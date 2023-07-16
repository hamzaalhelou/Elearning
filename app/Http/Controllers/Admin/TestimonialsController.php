<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest('id')->paginate(10);
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'position' => 'required',
            'content' => 'required'

        ]);

        $testimonimage = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $testimonimage);


        Testimonial::create([
            'name' => $request->name,
            'image' => $testimonimage,
            'position' => $request->position,
            'content' => $request->content
        ]);
        return redirect()
        ->route('admin.testimonials.index')
        ->with('msg', 'Testimonial added successfully')
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
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'position' => 'required',
            'content' => 'required'
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonimage = $testimonial->image;

        if($request->hasFile('image')) {

            $testimonimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $testimonimage);

        }


        $testimonial->update([
            'name' => $request->name,
            'image' => $testimonimage,
            'position' => $request->position,
            'content' => $request->content
        ]);


        return redirect()
        ->route('admin.testimonials.index')
        ->with('msg', 'Testimonial updated successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::destroy($id);

        return redirect()
        ->route('admin.testimonials.index')
        ->with('msg', 'Testimonial deleted successfully')
        ->with('type', 'danger');
    }
}
