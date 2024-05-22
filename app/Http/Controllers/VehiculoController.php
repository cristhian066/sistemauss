<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $vehiculos = Vehiculo::where('placa', 'like', '%' . $texto . '%')
                             ->orWhere('modelo', 'like', '%' . $texto . '%')
                             ->orWhere('propietario', 'like', '%' . $texto . '%')
                             ->paginate(10);

        return view('vehiculos.index', compact('vehiculos', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculo = new Vehiculo();
        return view('vehiculos.action', ['vehiculo' => $vehiculo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:20|unique:vehiculos,placa',
            'modelo' => 'required|string|max:100',
            'propietario' => 'required|string|max:100',
        ]);

        $vehiculo = new Vehiculo;
        $vehiculo->placa = $request->input('placa');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->propietario = $request->input('propietario');
        $vehiculo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Vehículo creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculos.action', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'placa' => 'required|string|max:20|unique:vehiculos,placa,' . $vehiculo->id,
            'modelo' => 'required|string|max:100',
            'propietario' => 'required|string|max:100',
        ]);

        $vehiculo->placa = $request->input('placa');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->propietario = $request->input('propietario');
        $vehiculo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Vehículo actualizado satisfactoriamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Vehículo eliminado satisfactoriamente'
        ]);
    }
}
