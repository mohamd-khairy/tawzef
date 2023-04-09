<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFrontUserRequest extends FormRequest
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
        $id = auth()->user()->id;

        return [
            // 'id' => "required|exists:users,id,deleted_at,NULL",
            'full_name' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg',
            'username' => "nullable|string|max:191|unique:users,username,{$id},id,deleted_at,NULL",
            'email' => "required|email|string|max:191|unique:users,email,{$id},id,deleted_at,NULL",
            'password' => 'nullable|string|min:6|confirmed',
            'mobile_number' => array('required', 'regex:/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/'),
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
