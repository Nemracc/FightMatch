<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    public function index()
    {
        $modalidades = Modalidad::all();
        return view('modalidad.index', compact('modalidades'));
    }

    public function create()
    {
        return view('modalidad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:50',
        ]);

        Modalidad::create($request->all());
        return redirect()->route('modalidad.index')->with('success', 'Modalidad creada correctamente.');
    }

    public function edit(Modalidad $modalidad)
    {
        return view('modalidad.edit', compact('modalidad'));
    }

    public function update(Request $request, Modalidad $modalidad)
    {
        $request->validate([
            'descripcion' => 'required|string|max:50',
        ]);

        $modalidad->update($request->all());
        return redirect()->route('modalidad.index')->with('success', 'Modalidad actualizada correctamente.');
    }

    public function destroy(Modalidad $modalidad)
    {
        $modalidad->delete();
        return redirect()->route('modalidad.index')->with('success', 'Modalidad eliminada correctamente.');
    }
}
