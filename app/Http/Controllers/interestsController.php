<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterestsRequest;
use App\Http\Requests\UpdateInterestsRequest;
use App\Models\Category;
use App\Models\Interest;
use Illuminate\Support\Facades\Auth;

class interestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $interests = Interest::with('category')->where('user_id', Auth::id())->get();
            $categories = Category::where('state', true)->get();
        } catch (\Throwable $th) {
            return redirect()->route('interests.index')->dangerBanner('Error consultando, Información no encontrada: ' . $th->getMessage());
        }
        return view('cv.interests.index', compact('interests', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterestsRequest $request)
    {
        try {
            Auth::user()->interests()->create($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('interests.index')->dangerBanner('Error eliminando, Información no encontrada: ' . $th->getMessage());
        }
        return redirect()->route('interests.index')->banner('Éxito, Interés agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Interest $interest)
    {
        try {
            $categories = Category::where('state', true)->get();
        } catch (\Throwable $th) {
            return redirect()->route('interests.index')->dangerBanner('Error editando, Información no encontrada: ' . $th->getMessage());
        }
        return view('cv.interests.edit', compact('interest', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterestsRequest $request, Interest $interest)
    {
        try {
            $interest->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('interests.index')->dangerBanner('Error actualizando, Información no encontrada: ' . $th->getMessage());
        }
        return redirect()->route('interests.index')->banner('Éxito, Interés actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interest $interest)
    {
        try {
            $interest->delete();
        } catch (\Throwable $th) {
            return redirect()->route('interests.index')->dangerBanner('Error eliminando, Información no encontrada: ' . $th->getMessage());
        }
        return redirect()->route('interests.index')->with('success', 'Interés eliminado correctamente.');
    }
}
