<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\user;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // Verifica si el usuario es administrador
        if (Auth::user()->UserType == 1) {
            // Usuario es administrador, devuelve la vista de administrador con los usuarios
            return view('admin.users.index', [
                'users' => User::orderBy('Acumulados', 'desc')->paginate(10)
            ]);
        } else {
            // Usuario no es administrador, carga los datos necesarios para la vista de perfil
            $user = Auth::user(); // Obtiene el usuario actualmente autenticado
            // Asumiendo que la vista de perfil necesita facturas u otros datos relacionados con el usuario
            $facturas = $user->facturas()->paginate(10); // Ejemplo de carga de facturas relacionadas
            return view('frontend.profile', compact('user', 'facturas'));
        }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Verifica si el usuario es administrador
        if (Auth::user()->UserType == 1) {
            // Usuario es administrador, permite acceder a la vista de creación
            return view('admin.users.create');
        } else {
            // Usuario no es administrador, redirige a la vista de perfil
            // Asume que ya tienes una instancia del usuario para pasar a la vista de perfil
            $user = Auth::user(); // Obtiene el usuario actualmente autenticado
            
            // Opcionalmente carga datos adicionales necesarios para la vista de perfil
            $facturas = $user->facturas()->paginate(10); // Ejemplo, ajusta según necesites
            
            return view('frontend.profile', compact('user', 'facturas'));
        }
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
    // public function edit(user $users)
    // {
    //     return view('admin.users.list', [
    //         'user' => $users
    //     ]);
    // }
   /**
     * Show Profile Vi.
     */

     public function profile()
     {
         $user = Auth::user(); // Obtiene el usuario autenticado
     
         // Para ambos, admin y no admin, obtienes las facturas
         $facturas = $user->facturas()->paginate(10);
     
         if ($user->UserType == '1') {
             // Administrador: carga la vista de perfil de administrador
             return view('admin.users.profile', compact('user', 'facturas'));
         } else {
             // No administrador: calcula el ranking del usuario y el total de usuarios para los mensajes personalizados
     
             // Suponiendo que tienes una columna 'Acumulados' en tu modelo User
             $usersOrderedByAcumulados = User::orderBy('Acumulados', 'desc')->get();
             $ranking = $usersOrderedByAcumulados->pluck('id')->search($user->id) + 1;
             $totalUsers = $usersOrderedByAcumulados->count();
     
             // Opcional: verificar si se debe mostrar la lista de ganadores (según una configuración)
             $showWinners = true; // Aquí deberías obtener el estado actual de la configuración de mostrar ganadores
     
             return view('frontend.profile', compact('user', 'facturas', 'ranking', 'totalUsers', 'showWinners'));
         }
     }


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
