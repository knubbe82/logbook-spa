<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Dive;
use Carbon\Carbon;

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
        ];
    }
}
