<?php

namespace Modules\Careers\Http\Requests;

use App\Http\Requests\FormRequest;use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Exception;
use Illuminate\Validation\Rule;

class UpdateCareerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $array = array();
        $array['id'] = "required|exists:careers,id,deleted_at,NULL";
        $array['number_of_available_vacancies'] = 'required|numeric';
        $array['title_en'] = 'required|string|max:191';
        $array['description_en'] = 'required|string|max:66595';
        $array['title_ar'] = 'required|string|max:191';
        $array['description_ar'] = 'required|string|max:66595';
        $array['is_featured'] = ['nullable', Rule::in(['on', 'off'])];

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
