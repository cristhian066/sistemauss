<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Http\Requests\EntradaRequest;
use App\Models\Vehiculo;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $entradas = Entrada::whereHas('vehiculo', function ($query) use ($texto) {
            $query->where('placa', 'like', '%' . $texto . '%');
        })->paginate(10);
        
        return view('entrada.index', compact('entradas', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entrada = new Entrada();
        $vehiculos = Vehiculo::all();
        return view('entrada.action', ['entrada' => $entrada, 'vehiculos' => $vehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradaRequest $request)
    {
        $entrada = new Entrada;
        $entrada->vehiculo_id = $request->input('vehiculo');
        $entrada->fecha = now(); // Fecha actual
        $entrada->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada creada satisfactoriamente'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        $vehiculos = Vehiculo::all();
        return view('entrada.action', compact('entrada', 'vehiculos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradaRequest $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->vehiculo_id = $request->input('vehiculo');
        $entrada->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada actualizada satisfactoriamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada eliminada'
        ]);
    }
}
