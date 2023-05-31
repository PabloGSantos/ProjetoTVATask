<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Professor::latest()->paginate(5);

        return view('professors.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'professor_name'          =>  'required',

            'professor_email'         =>  'required|email|unique:professors',

            'professor_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);

         $file_name = time() . '.' . request()->professor_image->getClientOriginalExtension();

         request()->professor_image->move(public_path('images'), $file_name);

         $professor = new Professor;

         $professor->professor_name = $request->professor_name;

        $professor->professor_email = $request->professor_email;

        $professor->professor_gender = $request->professor_gender;

        $professor->professor_image = $file_name;

         $professor->save();

         return redirect()->route('professors.index')->with('success', 'Professor Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        return view('professors.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {

        $request->validate([

            'professor_name'      =>  'required',

            'professor_email'     =>  'required|email',

            'professor_image'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);

        $professor_image = $request->hidden_professor_image;

        if($request->professor_image != '')

        {

            $professor_image = time() . '.' . request()->professor_image->getClientOriginalExtension();

            request()->professor_image->move(public_path('images'), $professor_image);

        }

        $professor = Professor::find($request->hidden_id);

        $professor->professor_name = $request->professor_name;

        $professor->professor_email = $request->professor_email;

        $professor->professor_gender = $request->professor_gender;

        $professor->professor_image = $professor_image;

        $professor->save();

        return redirect()->route('professors.index')->with('success', 'Professor Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();

        return redirect()->route('professors.index')->with('success', 'Professor Data deleted successfully');
    }

    public function __construct()
    {

        $this->middleware('auth');

    }
}
