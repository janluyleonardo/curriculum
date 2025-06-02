<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        // Obtener la educación relacionada con el usuario
        $educations = $user->educations()->get();
        // Retornar la vista con la información de educación
        // return $educations;
        return view('cv.education.index', compact('educations'));
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
    public function store(StoreEducationRequest $request)
    {
        try {
            Education::create([
                'userId' => $request['userId'],
                'degree' => $request['degree'],
                'institution' => $request['institution'],
                'startDate' => $request['startDate'],
                'endDate' => $request['endDate'],
                'description' => $request['description'],
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('education.index')->errorBanner('Error: Education record created failed with: ' . $th->getMessage());
        }

        return redirect()->route('education.index')->banner('success: Education record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::findOrFail($id);
        return view('cv.education.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cv.education.edit', [
            'education' => Education::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
            'description' => 'nullable|string',
        ]);

        // Buscar el registro de educación por su ID
        $education = Education::findOrFail($id);

        // Actualizar el registro con los datos validados
        try {
            $education->update([
                'degree' => $validatedData['degree'],
                'institution' => $validatedData['institution'],
                'startDate' => $validatedData['startDate'],
                'endDate' => $validatedData['endDate'],
                'description' => $validatedData['description'],
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->route('education.index')->dangerBanner('Error: Education record updated failed.');
        }

        // Redirigir a alguna parte de tu aplicación, por ejemplo, a la lista de educación
        return redirect()->route('education.index')->banner('success: Education record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educationDelete = Education::find($id);
        if ($educationDelete) {
            try {
                $educationDelete->delete();
                return redirect()->route('education.index')->banner('Éxito, Información eliminada correctamente.');
            } catch (\Throwable $th) {
                return redirect()->route('education.index')->dangerBanner('Error, Información no encontrada: ' . $th->getMessage());
            }
        } else {
            return redirect()->route('education.index')->dangerBanner('Error, Información no encontrada.');
        }
    }
}