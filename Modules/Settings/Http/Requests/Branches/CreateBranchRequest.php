<?php

namespace Modules\Settings\Http\Requests\Branches;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CreateBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $array = array();

        $array['branch'] = 'nullable|string|max:6995';
        $array['branch_ar'] = 'nullable|string|max:6995';
        $array['address_en'] = 'nullable|string|max:6995';
        $array['address_ar'] = 'nullable|string|max:6995';
        $array['map'] = 'nullable|string|max:6995';
        $array['email'] = 'nullable|string|max:6995';

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
