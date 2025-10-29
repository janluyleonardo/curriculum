<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperiencesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'functions' => 'required|string|max:1255',
            // 'currentlyPosition' => 'sometimes|boolean', // Acepta el valor del checkbox
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'position.required' => 'El puesto es obligatorio y debe ser una cadena de texto.',
            'position.string' => 'El puesto es obligatorio y debe ser una cadena de texto.',
            'position.max' => 'El puesto no puede tener más de 255 caracteres.',
            'company.required' => 'La empresa es obligatoria y debe ser una cadena de texto.',
            'company.string' => 'La empresa es obligatoria y debe ser una cadena de texto.',
            'company.max' => 'La empresa no puede tener más de 255 caracteres.',
            'functions.required' => 'Las funciones son obligatorias y deben ser una cadena de texto.',
            'functions.string' => 'Las funciones son obligatorias y deben ser una cadena de texto.',
            'functions.max' => 'Las funciones no pueden tener más de 1255 caracteres.',
            'startDate.required' => 'La fecha de inicio es obligatoria y debe ser una fecha válida.',
        ];
    }
}
