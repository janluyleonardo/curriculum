<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'dateOfBirth' => 'required|date',
            'Photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'document' => 'required|numeric',
            'phone' => 'required|numeric',
            'city' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'id_locality' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'personalProfile' => 'required|string',
            'social_media' => 'nullable|array',
            'social_media.*' => 'nullable|string',
            'social_media_links' => 'nullable|array',
            'social_media_links.*' => 'nullable|string',
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
            'dateOfBirth.required' => 'La fecha de nacimiento es obligatoria.',
            'dateOfBirth.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'Photo.required' => 'La foto es obligatoria.',
            'Photo.image' => 'La foto debe ser una imagen.',
            'Photo.mimes' => 'La foto debe ser un archivo de tipo: jpeg, png, jpg, gif.',
            'Photo.max' => 'La foto no puede ser mayor a 2048 kilobytes.',
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'document.required' => 'El número de documento es obligatorio.',
            'document.numeric' => 'El número de documento debe ser un número.',
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.numeric' => 'El número de teléfono debe ser un número.',
            'city.required' => 'La ciudad es obligatoria.',
            'city.string' => 'La ciudad debe ser una cadena de texto.',
            'city.max' => 'La ciudad no puede tener más de 255 caracteres.',
            'department.required' => 'El departamento es obligatorio.',
            'department.string' => 'El departamento debe ser una cadena de texto.',
            'department.max' => 'El departamento no puede tener más de 255 caracteres.',
            'id_locality.required' => 'La localidad es obligatoria.',
            'id_locality.string' => 'La localidad debe ser una cadena de texto.',
            'id_locality.max' => 'La localidad no puede tener más de 255 caracteres.',
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser una cadena de texto.',
            'address.max' => 'La dirección no puede tener más de 255 caracteres.',
            'barrio.required' => 'El barrio es obligatorio.',
            'barrio.string' => 'El barrio debe ser una cadena de texto.',
            'barrio.max' => 'El barrio no puede tener más de 255 caracteres.',
            'personalProfile.required' => 'El perfil personal es obligatorio.',
            'personalProfile.string' => 'El perfil personal debe ser una cadena de texto.',
        ];
    }
}
