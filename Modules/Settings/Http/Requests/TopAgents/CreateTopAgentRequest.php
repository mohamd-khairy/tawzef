<?php

namespace Modules\Settings\Http\Requests\TopAgents;

use App\Http\Requests\FormRequest;

class CreateTopAgentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => "required|max:102400|mimes:tiff,jpeg,png,jpg",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
