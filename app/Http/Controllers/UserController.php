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
    public function show(user $users) :view
    {
        return view('admin.users.show', [
            'user' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $users)
    {
        return view('admin.users.edit', [
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

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
