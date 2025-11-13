<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExperiencesRequest;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = null;
        $endDate = null;
        $endDateDisabled = false;
        $userId = Auth::id();
        $experiences = Experience::where('user_id', $userId)->get();
        // return $experiences;
        return view('cv.experience.index', compact('experiences', 'startDate', 'endDate', 'endDateDisabled'));
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
    public function store(StoreExperiencesRequest $request)
    {
        $userId = Auth::id();
        try {
            // Obtén todos los datos validados
            $validatedData = $request->validated();

            // Convierte el valor del checkbox a booleano
            $validatedData['currentlyPosition'] = $request->has('currentlyPosition');

            // Si el checkbox está marcado, establece `endDate` en null
            if ($validatedData['currentlyPosition']) {
                $validatedData['endDate'] = null;
            }
            $validatedData['user_id'] = $userId;
            // Crea el registro con los datos ajustados
            Experience::create($validatedData);

            return redirect()->route('experience.index')->banner('Éxito, Información de experiencia guardada correctamente.');
        } catch (\Throwable $th) {
            return redirect()->route('experience.index')->dangerBanner('Error, Información no guardada verifique: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cv.experience.show', [
            'experience' => Experience::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $startDate = null;
        $endDate = null;
        $endDateDisabled = false;
        $experiences = Experience::find($id);
        // return $experiences;
        // return "experience => $experience";
        return view('cv.experience.edit', [
            'experiences' => $experiences,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'endDateDisabled' => $endDateDisabled,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $validatedData = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'functions' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
        ]);

        $experience->update($validatedData);

        return redirect()->route('experience.index', $experience->id)
            ->banner('success: Experience updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experienceDelete = Experience::find($id);
        if ($experienceDelete) {
            try {
                $experienceDelete->delete();
                return redirect()->route('experience.index')->banner('Éxito, Información eliminada correctamente.');
            } catch (\Throwable $th) {
                return redirect()->route('experience.index')->dangerBanner('Error, Información no encontrada: ' . $th->getMessage());
            }
        } else {
            return redirect()->route('experience.index')->dangerBanner('Error, Información no encontrada.');
        }
    }
}
