<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\facturas;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreFacturasRequest;
use App\Http\Requests\UpdateFacturasRequest;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cambia `get()` por `paginate(n)`, donde `n` es el número de elementos por página
        $facturas = Facturas::with('user')->orderBy('created_at', 'desc')->paginate(10); // Ejemplo: paginar de 10 en 10
    
        return view('admin.facturas.index', compact('facturas'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            // Obtener todos los usuarios
    $users = User::all();

    // Pasar usuarios a la vista
    return view('admin.facturas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacturasRequest $request)
    {
        $factura = Facturas::create($request->validated());
        
        // Incrementar FacturasCargadas
        $user = User::find($factura->user_id);
        if ($user) {
            $user->increment('FacturasCargadas');
            // Alternativamente: $user->FacturasCargadas += 1; $user->save();
        }

            // Sumar PuntosDeFactura a Acumulados del usuario
    $user = User::find($factura->user_id);
    if ($user) {
        $user->increment('Acumulados', $factura->PuntosDeFactura);
    }

    
        return redirect()->route('facturas.index')
                         ->withSuccess('Se ha añadido una nueva factura.');
    }

    /**
     * Display the specified resource.
     */
    public function show(facturas $factura) : View
    {
        return view('admin.facturas.show', [
            'factura' => $factura
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(facturas $factura) 
    {
        // Obtener todos los usuarios
        $users = User::all();
    
        // Pasar tanto la factura como los usuarios a la vista
        return view('admin.facturas.edit', compact('factura', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacturasRequest $request, facturas $factura) : RedirectResponse
    {
        $user = User::find($factura->user_id);
        if ($user) {
            // Restar los puntos antiguos
            $user->decrement('Acumulados', $factura->PuntosDeFactura);
            // Actualizar factura con nuevos datos
            $factura->update($request->validated());
            // Sumar los nuevos puntos
            $user->increment('Acumulados', $request->PuntosDeFactura);
        } else {
            // Actualizar factura si no se encuentra el usuario
            $factura->update($request->validated());
        }
    
        return redirect()->route('facturas.index')->withSuccess('La factura se ha actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facturas $factura)
    {
        // Decrementar FacturasCargadas
        $user = User::find($factura->user_id);
        if ($user && $user->FacturasCargadas > 0) { // Asegurar que no sea negativo
            $user->decrement('FacturasCargadas');
            // Alternativamente: $user->FacturasCargadas -= 1; $user->save();
        }

        $user = User::find($factura->user_id);
        if ($user) {
            $user->decrement('Acumulados', $factura->PuntosDeFactura);
        }
          
        $factura->delete();
        
        return redirect()->route('facturas.index')
                         ->withSuccess('La factura se ha eliminado correctamente.');
    }
}
