<?php

namespace Modules\Careers\Http\Requests;

use App\Http\Requests\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Exception;
use Illuminate\Validation\Rule;

class CreateCareerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $array = array();
        // $array['number_of_available_vacancies'] = 'required|numeric';
        $array['name'] = 'required|string|max:191';
        $array['email'] = "required|email|string|max:191";
        $array['phone'] = array('required', 'regex:/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/');
        $array['address'] = "required|string|max:4294967295";
        $array['years_of_experience'] = "required|string|max:65";
        $array['gender'] = "required|string|max:4294967295";
        $array['services'] = 'required|array';
        $array['resume'] = 'required|max:102400|mimetypes:pdf,application/pdf,doc,application/msword,docx';
        $array['message'] = 'required|string|max:4294967295';

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
