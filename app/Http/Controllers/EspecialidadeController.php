<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Especialidade::latest()->paginate(10);

        return view('especialidades.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidades.create');
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
            'especialidade_name'           =>   'required'
        ]);

        $especialidade = new Especialidade;

        $especialidade->especialidade_name = $request->especialidade_name;
        $especialidade->save();

        return redirect()->route('especialidades.index')->with('success', 'Especialidade Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidade $especialidade)
    {
        return view('especialidades/show', compact('especialidade'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidade $especialidade)
    {
        return view('especialidade.edit', compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidade $especialidade)
    {
        $request->validade([
            'especialidade_name'      =>  'required'
        ]);


        $especialidade = Especialidade::find($request->hidden_id);
        $especialidade->especialidade_name = $request->especialidade_name;


        $especialidade->save();

        return redirect()->route('especialidades.index')->with('success', 'Especialidade Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidade $especialidade)
    {
        $especialidade->delete();

        return redirect()->route('especialidades.index')->with('success', 'Especialidade Data deleted successfully');
    }
}
