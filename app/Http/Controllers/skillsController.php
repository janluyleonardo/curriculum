<?php

namespace App\Http\Controllers;

use App\Models\AvailableSkill;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class skillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availableSkills = Skill::all();
        $userSkillIds = AvailableSkill::where('user_id', Auth::id())->pluck('skill_id')->toArray();
        return view('cv/skills/index', compact('availableSkills', 'userSkillIds'));
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
    public function store(Request $request)
    {
        Log::info('43: ' . $request);
        // $request->validate([
        //     'selected_skills' => 'required|array',
        //     'selected_skills.*' => 'exists:skills,id'
        // ]);
        Log::info('48: ' . $request);
        // return $request;

        $user = Auth::user();
        Log::info('52: ' . $request);

        // Eliminar skills anteriores (opcional, si quieres reemplazar)
        AvailableSkill::where('user_id', $user->id)->delete();

        // Asignar las nuevas skills
        foreach ($request->selected_skills as $skillId) {
            Log::info('59: ' . $request);
            AvailableSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skillId
            ]);
        }
        Log::info('65: ' . $request);
        return redirect()->route('skills.index')->banner('success: Skills updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Skill $skill)
    // {
    //     $skill = AvailableSkill::where('skill_id', $skill->id)->get();
    //     // return "entro en destroy" . $skill;
    //     try {
    //         $skill->delete();
    //         $availableSkills = Skill::all();
    //         $userSkillIds = AvailableSkill::where('user_id', Auth::id())->pluck('skill_id')->toArray();
    //         return redirect()->route('skills.index', compact('availableSkills', 'userSkillIds'))->banner('Registro eliminado correctamente.');
    //     } catch (\Throwable $th) {
    //         return redirect()->route('skills.index', $skill)->dangerBanner('no se pudo eliminar registro por que => ' . $th->getMessage());
    //     }
    // }
    public function destroy(Skill $skill)
    {
        try {
            // Buscar y eliminar el registro en AvailableSkill para el usuario autenticado
            AvailableSkill::where('user_id', Auth::id())
                ->where('skill_id', $skill->id)
                ->delete();

            return redirect()->route('skills.index')
                ->banner('Registro eliminado correctamente.');
        } catch (\Throwable $th) {
            return redirect()->route('skills.index')
                ->dangerBanner('no se pudo eliminar registro por que => ' . $th->getMessage());
        }
    }
}