<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\user;
use Illuminate\Http\RedirectResponse;




use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderBy('Acumulados', 'desc')->paginate(10)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        user::create($request->all());
        return redirect()->route('users.index')
                ->withSuccess('Se ha añadido un nuevo participante.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Cargando las facturas directamente a través de la relación
        // No es necesario el 'get()' si solo pasas la relación a la vista
        $facturas = $user->facturas;
    
        return view('admin.users.show', compact('user', 'facturas'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $users)
    {
        return view('admin.users.list', [
            'user' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function showFacturas(User $user)
{
    $facturas = $user->facturas;

    return view('admin.users.facturas', compact('user', 'facturas'));
}

    

    /**
     * Remove the specified resource from storage.
     */
public function destroy(User $user)
{
    // Eliminación del usuario
    $user->delete();

    // Redirección con mensaje de éxito
    return back()->with('success', 'Usuario eliminado exitosamente.');
}
}
