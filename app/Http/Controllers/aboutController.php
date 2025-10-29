<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener las localidades
        $localities = (new LocalityController())->index();

        // Obtener solo los registros de About pertenecientes al usuario logueado
        $userId = Auth::id();
        $abouts = About::with('locality') // Carga la relación locality
            ->where('user_id', $userId)
            ->get();

        // Retornar la vista con los datos
        return view('cv.about.index', compact('localities', 'abouts'));
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
    public function store(StoreAboutRequest $request)
    {
        $validatedData = $request->validated();
        $document = $validatedData['document'];
        $userId = Auth::id();

        $about = About::where('document', $document)->first();

        // Manejar la foto
        $validatedData['Photo'] = $this->handleUserPhoto($request, $document, $about ? $about->Photo : null);

        // Filtrar redes sociales seleccionadas
        $socialMediaLinks = $validatedData['social_media_links'] ?? [];
        $filteredSocialMediaLinks = array_filter($socialMediaLinks, function ($link) {
            return !is_null($link);
        });
        $validatedData['social_media_links'] = $filteredSocialMediaLinks;
        $validatedData['user_id'] = $userId;

        if ($about) {
            Log::info('Actualizando información de About', ['document' => $document]);
            try {
                $about->update($validatedData);
            } catch (\Throwable $th) {
                return $th;
            }
        } else {
            Log::info('Creando nueva información de About', ['document' => $document]);
            try {
                About::create($validatedData);
            } catch (\Throwable $th) {
                return $th;
            }
        }

        return redirect()->route('about.index')->banner('Éxito, Información guardada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = About::with('locality')->findOrFail($id);
        return view('cv.About.show', [
            'about' => About::with('locality')->findOrFail($id),
            'localities' => (new LocalityController())->index(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $about->load('locality'); // Carga la relación locality si no está cargada
        $localities = (new LocalityController())->index();

        return view('cv.about.edit', compact('about', 'localities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        $validatedData = $request->validated();
        $document = $validatedData['document'];

        // Manejar la foto
        $validatedData['Photo'] = $this->handleUserPhoto($request, $document, $about->Photo);
        // dd($validatedData['Photo']);
        // Filtrar redes sociales seleccionadas
        $socialMediaLinks = $validatedData['social_media_links'] ?? [];
        $filteredSocialMediaLinks = array_filter($socialMediaLinks, function ($link) {
            return !is_null($link);
        });
        $validatedData['social_media_links'] = $filteredSocialMediaLinks;

        $about->update($validatedData);

        return redirect()->route('about.index')->banner('Éxito, Información actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutDelete = About::find($id);
        if ($aboutDelete) {
            try {
                $aboutDelete->delete();
                return redirect()->route('about.index')->banner('Éxito, Información eliminada correctamente.');
            } catch (\Throwable $th) {
                return redirect()->route('about.index')->dangerBanner('Error eliminando, Información no encontrada: ' . $th->getMessage());
            }
        } else {
            return redirect()->route('about.index')->dangerBanner('Error, Información no encontrada.');
        }
    }

    /**
     * Maneja el guardado y actualización de la foto del usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $document
     * @param string|null $oldPhotoPath
     * @return string|null
     */
    private function handleUserPhoto($request, $document, $oldPhotoPath = null)
    {
        if ($request->hasFile('Photo')) {
            $photo = $request->file('Photo');
            $userId = Auth::id();
            $filename = 'user_' . $userId . '_photo.' . $photo->getClientOriginalExtension();

            // Eliminar la foto anterior si existe
            if ($oldPhotoPath && Storage::disk('public')->exists($oldPhotoPath)) {
                Storage::disk('public')->delete($oldPhotoPath);
            }

            $path = $photo->storeAs('curriculumPhotos/' . $document, $filename, 'public');
            return $path; // Devuelve el path de la nueva imagen
        }

        return $oldPhotoPath; // Si no hay nueva foto, devuelve el path anterior
    }
}
