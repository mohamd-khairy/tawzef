<?php

namespace Modules\Settings\Http\Requests\Contacts;

use App\Http\Requests\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:contacts,id,deleted_at,NULL',
            'type' => 'required|string|max:191',
            'value' => 'required|string|max:191',
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
