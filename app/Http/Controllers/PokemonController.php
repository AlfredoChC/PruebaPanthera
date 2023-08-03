<?php

namespace App\Http\Controllers;

use App\Models\Pokemones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemon = Pokemones::all();
    return view('pokemon-list', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemones.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'habilidad1' => 'required|string|max:255',
        'habilidad2' => 'nullable|string|max:255',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Procesar el archivo de imagen si se envió
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen')->store('public/pokemon');
    } else {
        $imagen = null;
    }

    // Crear el nuevo Pokémon en la base de datos
    $pokemon = new Pokemones();
    $pokemon->nombre = $request->nombre;
    $pokemon->habilidad1 = $request->habilidad1;
    $pokemon->habilidad2 = $request->habilidad2;
    $pokemon->imagen = $imagen;
    $pokemon->save();

    // Redirigir a la vista index con un mensaje de éxito
    return redirect()->route('pokemon-list')->with('success', '¡Nuevo Pokémon creado correctamente!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pokemon = Pokemones::findOrFail($id);
    return view('pokemones.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'habilidad1' => 'required',
            'habilidad2' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $pokemon = Pokemones::findOrFail($id);
        $pokemon->nombre = $request->nombre;
        $pokemon->habilidad1 = $request->habilidad1;
        $pokemon->habilidad2 = $request->habilidad2;
    
        if ($request->hasFile('imagen')) {
            Storage::delete($pokemon->imagen);
            $path = $request->file('imagen')->store('public/images');
            $pokemon->imagen = $path;
        }
    
        $pokemon->save();
    
        return redirect()->route('pokemon-list')->with('success', 'Pokemon actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pokemon = Pokemones::findOrFail($id);
    Storage::delete($pokemon->imagen);
    $pokemon->delete();

    return redirect()->route('pokemon-list')->with('success', 'pokemon eliminado correctamente.');

    }
}
