<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class PrayerTimetableRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request) {
        $rules = [
            'fajr' => 'required',
            'fajr_jamaat' => 'required',
            'dhuhr' => 'required',
            'dhuhr_jamaat' => 'required',
            'asr' => 'required',
            'asr_jamaat' => 'required',
            'magrib' => 'required',
            'isha' => 'required',
            'isha_jamaat' => 'required'
        ];
        return $rules;
    }

}
