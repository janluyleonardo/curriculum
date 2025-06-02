<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExperiencesRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('cv.experience.index', compact('experiences'));
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
        // return $request;
        try {
            $affected = Experience::create($request->all());
            return redirect()->route('experience.index')->banner('Éxito, Información guardada correctamente.');
        } catch (\Throwable $th) {
            return $th;
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
        $experiences = Experience::find($id);
        // return "experience => $experience";
        return view('cv.experience.edit', [
            'experiences' => $experiences,
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
