<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Venda::latest()->paginate(5);

        return view('vendas.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendas.create');
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

            'venda_name'          =>  'required',

            'venda_inf'         =>  'required|inf|unique:vendas',

            'venda_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);

         $file_name = time() . '.' . request()->venda_image->getClientOriginalExtension();

         request()->venda_image->move(public_path('images'), $file_name);

         $venda = new Venda;

         $venda->venda_name = $request->venda_name;

        $venda->venda_inf = $request->venda_inf;

        $venda->venda_tipo = $request->venda_tipo;

        $venda->venda_image = $file_name;

         $venda->save();

         return redirect()->route('vendas.index')->with('success', 'Venda Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        return view('vendas.edit', compact('venda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        $request->validate([

            'venda_name'      =>  'required',

            'venda_inf'     =>  'required|inf',

            'venda_image'     => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'  ]);

        $venda_image = $request->hidden_venda_image;

        if($request->venda_image != '')

        {

            $venda_image = time() . '.' . request()->venda_image->getClientOriginalExtension();

            request()->venda_image->move(public_path('images'), $venda_image);

        }

        $venda = Venda::find($request->hidden_id);

        $venda->venda_name = $request->venda_name;

        $venda->venda_inf = $request->venda_inf;

        $venda->venda_tipo = $request->venda_tipo;

        $venda->venda_image = $venda_image;

        $venda->save();

        return redirect()->route('vendas.index')->with('success', 'Vendas Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        return redirect()->route('vendas.index')->with('success', 'Venda Data deleted successfully');
    }

    public function __construct()
    {

        $this->middleware('auth');

    }
}
