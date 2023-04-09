<?php

namespace Modules\Settings\Http\Requests\TopAgents;

use App\Http\Requests\FormRequest;

class UpdateTopAgentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:top_agents,id,deleted_at,NULL',
            'image' => "nullable|max:102400|mimes:tiff,jpeg,png,jpg",
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
