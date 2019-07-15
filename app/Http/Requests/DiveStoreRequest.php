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
        $latestTime = Dive::latest()->first()->time ?? null;
        $latestDate = null;
        if($latestTime) {
            $latestDate = Carbon::parse($latestTime)->toDateString();
        }

        if($latestDate) {
            return [
                'date'              => 'before_or_equal:now',
                'date'              => 'after_or_equal:'.$latestDate,
                'time'              => 'required',
                'location'          => 'required',
                'bottom_time'       => 'required|numeric',
                'max_depth'         => 'required|numeric',
            ];
        }

        return [
            'date'              => 'before_or_equal:now',
            'time'              => 'required',
            'location'          => 'required',
            'bottom_time'       => 'required|numeric',
            'max_depth'         => 'required|numeric',
        ];        
        
    }
}
