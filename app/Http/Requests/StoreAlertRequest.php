<?php

namespace App\Http\Requests;

use App\Alert;
use App\Rules\AlertDateRange;
use App\Rules\DatesOverlap;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlertRequest extends FormRequest
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
            'start_date' => ['required', 'date'],
            'end_date' => ['required','date','after_or_equal:start_date'],
            'short_text' => 'required|string|max:60',
            'long_text' => 'required|string',
        ];
    }


    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->alertInDateRange()) {
                $validator->errors()->add('range', 'There is an existing alert running in this date range');
            }
        });
    }

    /**
     * Does an alert already exist in this range
     *
     * @return bool
     */
    public function alertInDateRange() :bool
    {

        if ( is_null($this->start_date) || is_null($this->end_date) )
        {
            return false;
        }

        $alertsInRange  = Alert::inDateRange($this->start_date, $this->end_date);

        if ($this->alert)
        {
            $alertsInRange->whereNotIn('id', [$this->alert->id]);
        }

        $alertsInRange = $alertsInRange->get();

        return $alertsInRange->isNotEmpty();

    }
}
