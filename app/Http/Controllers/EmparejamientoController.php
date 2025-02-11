<?php

namespace App\Http\Controllers;

use App\Models\Emparejamiento;
use App\Models\Peleador;
use Illuminate\Http\Request;

class EmparejamientoController extends Controller
{
    public function index()
    {
        // Invocar la función PostgreSQL para generar emparejamientos
        $emparejamientos = Emparejamiento::RecuperaEmparejamientos();

        return view('emparejamientos.index', compact('emparejamientos'));
    }

    public function create()
    {
        $peleadores = Peleador::all();
        return view('emparejamientos.create', compact('peleadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peleador1_id' => 'required|exists:peleadores,id',
            'peleador2_id' => 'required|exists:peleadores,id|different:peleador1_id',
        ]);

        // Crea el emparejamiento en la base de datos
        Emparejamiento::create([
            'peleador1_id' => $request->peleador1_id,
            'peleador2_id' => $request->peleador2_id,
            'fecha' => now(),
        ]);

        return redirect()->route('emparejamientos.generate')->with('success', 'Emparejamiento guardado con éxito.');
    }


    public function destroy(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'id' => 'required',
        ]);
    
        // Buscar el emparejamiento y eliminarlo
        $emparejamiento = Emparejamiento::findOrFail($request->id);
        $emparejamiento->delete();
    
        // Redireccionar con un mensaje de éxito
        return redirect()->route('emparejamientos.index')->with('success', 'Emparejamiento eliminado correctamente.');
    }
    

    public function generate(Request $request)
    {
        // Obtén los parámetros de diferencia con valores predeterminados
        $diferenciaPesoMax = $request->get('diferencia_peso', 3); // Valor predeterminado: 3
        $diferenciaPeleasMax = $request->get('diferencia_peleas', 2); // Valor predeterminado: 2

        // Invocar la función PostgreSQL para generar emparejamientos
        $emparejamientos = Emparejamiento::generarEmparejamientos($diferenciaPesoMax, $diferenciaPeleasMax);
        // Retornar la vista con los resultados
        return view('emparejamientos.generate', compact('emparejamientos', 'diferenciaPesoMax', 'diferenciaPeleasMax'));
    }
}
