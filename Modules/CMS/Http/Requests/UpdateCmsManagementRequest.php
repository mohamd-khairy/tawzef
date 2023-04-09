<?php

namespace Modules\CMS\Http\Requests;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class UpdateCmsManagementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'id' => 'required|exists:cms_managements,id,deleted_at,NULL',
            'title_en' => 'required|string|max:191',
            'description_en' => 'required|string|max:65535',
            'title_ar' => 'required|string|max:191',
            'description_ar' => 'required|string|max:65535',
            'type' => ['required', Rule::in(['faqs', 'terms_conditions', 'rules_regulations', 'privacy_policy', 'return_policy', 'delivery_details', 'cookies', 'payment_security','award','social','technology','report','magazine'])],
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
