<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'price' => 'required',
            'year' => 'required',
            'first_registration' => 'required',
            'mileage' => 'required',
            'co2_emission' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'Please write the price of the car',
            'year.required' => 'Please write the year of the car',
            'first_registration.required' => 'Please write the year of the first registration',
            'mileage.required' => 'Please write the mileage',
            'co2_emission.required' => 'Please write the co2 emission',
        ];
    }
}
