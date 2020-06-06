<?php

namespace App\Http\Requests;


use App\Activation;
use Illuminate\Foundation\Http\FormRequest;

class ActivateUserRequest extends FormRequest
{

	public $activation;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	$this->activation  = new Activation();
    	return $this->activation->findByEmail($this->email)->isValid($this->token);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
        ];
    }
}
