<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiveStoreRequest extends FormRequest
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
            'time'              => 'required',
            'location'          => 'required',
            'bottom_time'       => 'required|numeric',
            'max_depth'         => 'required|numeric',
            'water_temp'        => 'required|numeric',
            'day_night'         => 'required',
            'visibility'        => 'required|numeric',
            'dive_start'        => 'required',
            'current'           => 'required',
            'tank_type'         => 'required',
            'tank_capacity'     => 'required',
            'bar_start'         => 'required|numeric',
            'bar_end'           => 'required|numeric',
            'gas_mix'           => 'required',
            'belt_weights'      => 'required_without:bcd_weights',
            'bcd_weights'       => 'required_without:belt_weights',
        ];
    }
}
