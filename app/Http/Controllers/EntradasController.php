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
        $vehiculos = Vehiculo::all();
        return view('entrada.create', compact('vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradaRequest $request)
    {
        $entrada = new Entrada;
        $entrada->vehiculo_id = $request->input('vehiculo_id');
        $entrada->fecha = $request->input('fecha');
        $entrada->save();

        return redirect()->route('entrada.index')->with('success', 'Entrada creada satisfactoriamente');
    }
}
