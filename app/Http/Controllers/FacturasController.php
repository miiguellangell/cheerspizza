<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\facturas;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreFacturasRequest;
use App\Http\Requests\UpdateFacturasRequest;
use Illuminate\Support\Facades\Auth;


class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->UserType == 0) {
            // Usuarios no administradores ven solo sus facturas
            $facturas = Facturas::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        } else {
            // Usuarios administradores ven todas las facturas
            $facturas = Facturas::with('user')->orderBy('created_at', 'desc')->paginate(10);
        }
  
        return view('admin.facturas.index', compact('facturas'));
    }

    
    public function create()
    {
    // Obtener todos los usuarios
    $users = User::all();
    if (Auth::user()->UserType == 1) {
    // Pasar usuarios a la vista
    return view('admin.facturas.create', compact('users'));}
    
    else{
        // Pasar usuarios a la vista
        return view('frontend.create', compact('users'));}

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

        if (Auth::user()->UserType == 1) {
        return redirect()->route('facturas.index')->withSuccess('Se ha añadido una nueva factura.');
        }
        else{
        return redirect()->route('home')->withSuccess('Se ha añadido una nueva factura.');
        }

    }

public function edit(Facturas $factura)
{
    if (Auth::user()->UserType == 0 && $factura->user_id != Auth::id()) {
        // Redirigir si el usuario no es el propietario de la factura
        return redirect()->route('nombre.ruta.perfil.usuario')->with('error', 'Acceso no autorizado');
    }

    $users = User::all();
    return view('admin.facturas.edit', compact('factura', 'users'));
}


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
    
        if (Auth::user()->UserType == 1) {
            return redirect()->route('facturas.index')->withSuccess('La factura se ha actualizado correctamente.');
            }
            else{
            return redirect()->route('home')->withSuccess('Se ha añadido una nueva factura.'); ;
            }
    }


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

    // Comprobar el tipo de usuario después de eliminar la factura
    if (Auth::user()->UserType == 0) {
        // Si es un usuario no administrador, redirigir a 'frontend.profile'
        // Asegúrate de pasar el ID del usuario como parámetro
        return redirect()->route('frontend.profile', ['user' => Auth::id()])->withSuccess('La factura se ha eliminado correctamente.');
    } else {
        // Si es un usuario administrador, redirigir a 'facturas.index'
        return redirect()->route('home')->withSuccess('La factura se ha eliminado correctamente.');
    }
}



}