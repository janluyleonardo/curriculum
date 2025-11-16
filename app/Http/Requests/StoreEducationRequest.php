<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ];
    }
}
