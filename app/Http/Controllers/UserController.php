<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $usuarios = User::where('name', 'like', '%' . $texto . '%')
                        ->orWhere('email', 'like', '%' . $texto . '%')
                        ->paginate(10);
        return view('usuario.index', compact('usuarios', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = new User();
        return view('usuario.action', ['usuario' => $usuario]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.action', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        if ($request->has('password')) {
            $usuario->password = bcrypt($request->input('password'));
        }
        $usuario->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario actualizado satisfactoriamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario eliminado satisfactoriamente'
        ]);
    }
}
