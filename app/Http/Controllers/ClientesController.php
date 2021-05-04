<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=Clientes::paginate(5);
        return view('Clientes.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Telefono'=>'required|string|max:15',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$mensaje);

        //$datosCliente=request()->all();
        $datosCliente=request()->except('_token');
        if ($request->hasFile('Foto')){
            $datosCliente['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Clientes::insert($datosCliente);
        return redirect('clientes')->with('Mensaje', 'Cliente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Telefono'=>'required|string|max:15',
            'Correo'=>'required|email',
            'Direccion'=>'required|string|max:100'
        ];
        
        if ($request->hasFile('Foto')){
            $campos+=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }
        $mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$mensaje);
        $datosCliente=request()->except(['_token','_method']);
        
        if ($request->hasFile('Foto')){
            $cliente=Clientes::findOrFail($id);
            
            Storage::delete('public/'.$cliente->Foto);            
            
            $datosCliente['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Clientes::where('id','=',$id)->update($datosCliente);
        //$cliente=Clientes::findOrFail($id);
        //return view('clientes.edit', compact('cliente'));
        return redirect('clientes')->with('Mensaje', 'Cliente modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente=Clientes::findOrFail($id);
            
        if (Storage::delete('public/'.$cliente->Foto)){

            Clientes::destroy($id);
        }        
        

        return redirect('clientes');    
    }
}
