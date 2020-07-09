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
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after_or_equal:starts_at'],
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
     * Does an alert already exist in this range.
     *
     * @return bool
     */
    public function alertInDateRange() :bool
    {
        if (is_null($this->starts_at) || is_null($this->ends_at)) {
            return false;
        }

        $alertsInRange = Alert::inDateRange($this->starts_at, $this->ends_at);

        if ($this->alert) {
            $alertsInRange->whereNotIn('id', [$this->alert->id]);
        }

        $alertsInRange = $alertsInRange->get();

        return $alertsInRange->isNotEmpty();
    }
}
