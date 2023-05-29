<?php

namespace Modules\Careers\Http\Requests;

use App\Http\Requests\FormRequest;
class ApplyCareerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'career_id' => 'required|exists:careers,id,deleted_at,NULL',
            'full_name' => 'required|string||max:191',
            'email' => 'nullable|email|max:191',
            'phone' => 'required|numeric|max:11|regex:/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/',
            'message' => 'nullable|string',
            // 'subject' =>'required|string|max:191',
            'attachment.*' => 'required|max:102400|mimetypes:pdf,application/pdf,doc,application/msword,docx'
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
