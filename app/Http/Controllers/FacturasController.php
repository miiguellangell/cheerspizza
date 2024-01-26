<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\facturas;
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
        return view('admin.index', [
            'facturas' => facturas::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefacturaRequest $request) : RedirectResponse
    {
        factura::create($request->all());
        return redirect()->route('facturas.index')
                ->withSuccess('Se ha añadido una nueva factura.');
    }

    /**
     * Display the specified resource.
     */
    public function show(factura $factura) : View
    {
        return view('facturas.show', [
            'factura' => $factura
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facturas $facturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefacturaRequest $request, factura $factura) : RedirectResponse
    {
        $factura->update($request->all());
        return redirect()->back()
                ->withSuccess('La factura se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(factura $factura) : RedirectResponse
    {
        $factura->delete();
        return redirect()->route('facturas.index')
                ->withSuccess('La Factura se borro de manera exitosa.');
    }
}
