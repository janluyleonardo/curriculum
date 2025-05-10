<?php

namespace App\Http\Controllers;

use App\Models\locality;
use App\Http\Requests\StorelocalityRequest;
use App\Http\Requests\UpdatelocalityRequest;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = locality::all();
        return $localities;
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
     * @param  \App\Http\Requests\StorelocalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelocalityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function show(locality $locality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function edit(locality $locality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelocalityRequest  $request
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelocalityRequest $request, locality $locality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\locality  $locality
     * @return \Illuminate\Http\Response
     */
    public function destroy(locality $locality)
    {
        //
    }
}
