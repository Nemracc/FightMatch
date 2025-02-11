<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Peleador;
use App\Models\Modalidad;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PeleadorStoreRequest;
use App\Http\Requests\PeleadorUpdateRequest;

class PeleadorController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $peleadores = Peleador::with('modalidad')->get();
        
        return view('peleadores.index', compact('peleadores'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // return view('peleadores.create');
        $modalidades = Modalidad::all();
        return view('peleadores.create', compact('modalidades'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(PeleadorStoreRequest $request): RedirectResponse
    {   
        Peleador::create($request->validated());
         
        return redirect()->route('peleadores.index')
                         ->with('success', 'Peleador created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $peleador = Peleador::with('modalidad')->find($id);
        return view('peleadores.show', compact('peleador'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $peleador = Peleador::with('modalidad')->find($id);
        $modalidades = Modalidad::all();
        // dd($peleador);
        return view('peleadores.edit', compact('peleador', 'modalidades'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(PeleadorUpdateRequest $request, Peleador $product): RedirectResponse
    {
        $product->update($request->validated());
        
        return redirect()->route('peleadores.index')
                        ->with('success','Peleador updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $peleador = Peleador::find($id)->delete();
         
        return redirect()->route('peleadores.index')
                        ->with('success','Peleador deleted successfully');
    }
}
