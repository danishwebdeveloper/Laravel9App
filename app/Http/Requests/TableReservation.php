<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableReservation extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'persons' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Please Select a valid Date, Thanks',
            'time.required' => 'Please Select a Time, Thanks',
        ];
    }
}