<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    // Mostrar el preview en HTML
    public function preview()
    {
        $user = auth()->user();
        $data = [
            'about' => $user->about,
            'experiences' => $user->experiences,
            'education' => $user->education,
            'skills' => $user->skills,
            'awards' => $user->awards,
        ];
        return $data;
        return view('curriculum.preview', $data);
    }

    // Generar el PDF
    public function generatePDF()
    {
        $user = auth()->user();
        $data = [
            'about' => $user->about,
            'experiences' => $user->experiences,
            'education' => $user->education,
            'skills' => $user->skills,
            'awards' => $user->awards,
        ];

        $pdf = PDF::loadView('curriculum.pdf', $data);
        return $pdf->download('curriculum_' . $user->name . '.pdf');
    }
}
