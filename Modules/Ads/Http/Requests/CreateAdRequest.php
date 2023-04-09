<?php

namespace Modules\Ads\Http\Requests;

use App\Http\Requests\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Exception;
use Illuminate\Validation\Rule;

class CreateAdRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $array = array();
        $array['title'] = "required|string|max:191";
        // $array['start_date'] = 'required|date';
        // $array['end_date'] = 'nullable|date';
        $array['link'] = 'nullable|url';
        // $array['is_featured'] = ['nullable', Rule::in(['on', 'off'])];
        $array['image'] = "required|max:102400|mimes:tiff,jpeg,png,jpg,webp";

        return $array;
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
