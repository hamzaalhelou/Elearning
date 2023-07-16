<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::latest('id')->paginate(10);
        return view('admin.instructors.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'position'=>'required',
            'fb_link'=>'required',
            'tw_link'=>'required',
            'ln_link'=>'required'
        ]);

        $instrucimage = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $instrucimage);


        Instructor::create([
            'name' => $request->name,
            'image' => $instrucimage,
            'position' => $request->position,
            'fb_link' => $request->fb_link,
            'tw_link' => $request->tw_link,
            'ln_link' => $request->ln_link
        ]);
        return redirect()
        ->route('admin.instructors.index')
        ->with('msg', 'Instructors added successfully')
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
        $instructor = Instructor::findOrFail($id);

        return view('admin.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'position'=>'required',
            'fb_link'=>'required',
            'tw_link'=>'required',
            'ln_link'=>'required'
        ]);

        $instructors = Instructor::findOrFail($id);

        $instrucimage = $instructors->image;

        if($request->hasFile('image')) {

            $instrucimage = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $instrucimage);

        }


        $instructors->update([
            'name' => $request->name,
            'image' => $instrucimage,
            'position' => $request->position,
            'fb_link' => $request->fb_link,
            'tw_link' => $request->tw_link,
            'ln_link' => $request->ln_link
        ]);


        return redirect()
        ->route('admin.instructors.index')
        ->with('msg', 'instructors updated successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Instructor::destroy($id);

        return redirect()
        ->route('admin.instructors.index')
        ->with('msg', 'instructor deleted successfully')
        ->with('type', 'danger');
    }
}
