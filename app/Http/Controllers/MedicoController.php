<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * index a parte da pagina do medico
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Medico::latest()->paginate(3);

        return view('medicos.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidade = new Especialidade();// criando uma instancia da classe especiadade
        $especialidades = $especialidade->all();// variável que possue todos os dados da tabela especialidades

        return view('medicos.create',compact('especialidades'));
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

            'medico_name'          =>  'required',
            'medico_email'         =>  'required|email|unique:medicos',
            'medico_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
    ]);

         $file_name = time() . '.' . request()->medico_image->getClientOriginalExtension();

         request()->medico_image->move(public_path('images'), $file_name);

         $medico = new Medico;

        $medico->medico_name = $request->medico_name;
        $medico->medico_email = $request->medico_email;
        $medico->medico_gender = $request->medico_gender;
        $medico->medico_image = $file_name;
        $medico->id_especialidade = $request->id_especialidade;

        $medico->save();

        return redirect()->route('medico.index')->with('success', 'Medico Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        $especialidade = new Especialidade();
        $especialidade = $especialidade->all();
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {

        $request->validate([

            'medico_name'      =>  'required',
            'medico_email'     =>  'required|email',
            'medico_image'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);
        
        $medico_image = $request->hidden_medico_image;

        if ($request->medico_image != '') {
            $medico_image = time() . '.' . request()->medico_image->getClientOriginalExtension();

            request()->medico_image->move(public_path('images'), $medico_image);

        }

        $medico = Medico::find($request->hidden_id);

        $medico->medico_name = $request->medico_name;

        $medico->medico_email = $request->medico_email;

        $medico->medico_gender = $request->medico_gender;

        $medico->medico_image = $medico_image;
        $medico->id_especialidade = $request->id_especialidade;
           
        $medico->save();

        return redirect()->route('medico.index')->with('success', 'Medico Data has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return redirect()->route('medico.index')->with('success', 'Medico Data deleted successfully');
    }

    public function __construct()
    {

        $this->middleware('auth');

    }
}