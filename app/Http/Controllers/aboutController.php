<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lista de localidades
        $localities = new LocalityController();
        $localities = $localities->index();
        //lista de registros de about
        $abouts = About::all();
        // return $localities;
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
        $document = $validatedData['document']; // Obtener el número de documento del usuario

        // Verificar si ya existe un registro para el usuario
        $about = About::where('document', $document)->first();

        // Manejar la subida de la imagen
        if ($request->hasFile('Photo')) {
            $path = $request->file('Photo')->storeAs(
                'curriculumPhotos/' . $document,
                $request->file('Photo')->getClientOriginalName(),
                'public'
            );

            // Guardar la ruta de la imagen en los datos validados
            $validatedData['Photo'] = $path;
        }

        // Verificar si social_media_links está presente en los datos validados
        $socialMediaLinks = $validatedData['social_media_links'] ?? [];

        // Filtrar solo las redes sociales seleccionadas
        $filteredSocialMediaLinks = array_filter($socialMediaLinks, function ($link) {
            return !is_null($link);
        });

        $validatedData['social_media_links'] = $filteredSocialMediaLinks;

        if ($about) {
            // Si ya existe un registro, actualízalo
            $about->update($validatedData);
        } else {
            // Si no existe, crea un nuevo registro
            About::create($validatedData);
        }

        return redirect()->route('about.index')->banner('Exito, Información guardada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cv.About.show', [
            'about' => About::find($id),
            'localities' => (new LocalityController())->index(),
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
        // $about = About::find($id);
        // return $about;
        return view('cv.about.edit', [
            'about' => About::find($id),
            'localities' => (new LocalityController())->index(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $about->update($request->all());
        // Manejar la subida de la imagen
        if ($request->hasFile('Photo')) {
            $path = $request->file('Photo')->storeAs(
                'curriculumPhotos/' . $about->document,
                $request->file('Photo')->getClientOriginalName(),
                'public'
            );

            // Guardar la ruta de la imagen en los datos validados
            $about->Photo = $path;
        }
        // Verificar si social_media_links está presente en los datos validados
        $socialMediaLinks = $request->input('social_media_links', []);
        // Filtrar solo las redes sociales seleccionadas
        $filteredSocialMediaLinks = array_filter($socialMediaLinks, function ($link) {
            return !is_null($link);
        });
        $about->social_media_links = $filteredSocialMediaLinks;
        $about->save();
        return redirect()->route('about.index')->banner('Exito, Información actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
