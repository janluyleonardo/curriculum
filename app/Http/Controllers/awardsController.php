<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class awardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $awards = Award::where('user_id', Auth::id())->get();
        } catch (\Throwable $th) {
            return redirect()->route('awards.index')->dangerBanner('Error consultando, Información no encontrada: ' . $th->getMessage());
        }
        //code...
        return view('cv.awards.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.awards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
        ]);
        try {
            Auth::user()->awards()->create($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('awards.index')->dangerBanner('Error creando, Información no encontrada: ' . $th->getMessage());
        }
        return redirect()->route('awards.index')->banner('Éxito, Premio guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        return view('cv.awards.show', compact('award'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        return view('cv.awards.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'nullable|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
        ]);
        try {
            $award->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('awards.index')->dangerBanner('Error creando, Información no encontrada: ' . $th->getMessage());
        }
        return redirect()->route('awards.index')->banner('Éxito, Premio actualizado correctamente.');
    }

    /**
     * destroy
     *
     * @param  mixed $award
     * @return void
     */
    public function destroy(Award $award)
    {
        try {
            $award->delete();
        } catch (\Throwable $th) {
            return redirect()->route('awards.index')->dangerBanner('Error creando, Información no encontrada: ' . $th->getMessage());
        }
        return redirect()->route('awards.index')->banner('Éxito, Premio eliminado correctamente.');
    }
}
