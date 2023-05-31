<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Paciente::latest()->paginate(5);

        return view('pacientes.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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

            'paciente_name'          =>  'required',

            'paciente_email'         =>  'required|email|unique:pacientes',

            'paciente_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);

         $file_name = time() . '.' . request()->paciente_image->getClientOriginalExtension();

         request()->paciente_image->move(public_path('images'), $file_name);

         $paciente = new Paciente;

         $paciente->paciente_name = $request->paciente_name;

        $paciente->paciente_email = $request->paciente_email;

        $paciente->paciente_gender = $request->paciente_gender;

        $paciente->paciente_image = $file_name;

         $paciente->save();

         return redirect()->route('pacientes.index')->with('success', 'Paciente Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {

        $request->validate([

            'paciente_name'      =>  'required',

            'paciente_email'     =>  'required|email',

            'paciente_image'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);

        $paciente_image = $request->hidden_paciente_image;

        if($request->paciente_image != '')

        {

            $paciente_image = time() . '.' . request()->paciente_image->getClientOriginalExtension();

            request()->paciente_image->move(public_path('images'), $paciente_image);

        }

        $paciente = Paciente::find($request->hidden_id);

        $paciente->paciente_name = $request->paciente_name;

        $paciente->paciente_email = $request->paciente_email;

        $paciente->paciente_gender = $request->paciente_gender;

        $paciente->paciente_image = $paciente_image;

        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente Data deleted successfully');
    }

    public function __construct()
    {

        $this->middleware('auth');

    }
}