<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;

class CurriculumController extends Controller
{
    // Mostrar el preview en HTML
    public function preview()
    {
        $user = auth()->user();
        $data = [
            'about' => $user->about,
            'experiences' => $user->experiences,
            'educations' => $user->educations,
            'skills' => $user->skills,
            'awards' => $user->awards,
        ];
        // return $data;
        return view('cv/curriculum.preview', $data);
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
        // return  $data;

        $pdf = PDF::loadView('cv.curriculum.pdf', $data);
        return $pdf->download('curriculum_' . $user->name . '.pdf');
    }
}
