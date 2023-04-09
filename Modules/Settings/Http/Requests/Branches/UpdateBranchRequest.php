<?php

namespace Modules\Settings\Http\Requests\Branches;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateBranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $array = array();

        $array['id'] = 'required|exists:branches,id,deleted_at,NULL';
        $array['branch'] = 'required|string|max:191';
        $array['branch_ar'] = 'required|string|max:191';
        $array['address_en'] = 'required|string|max:6665';
        $array['address_ar'] = 'required|string|max:6665';
        $array['map'] = 'required|string|max:6665';
        $array['email'] = 'required|string|max:6665';
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
