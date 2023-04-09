<?php

namespace Modules\Settings\Http\Requests\MainSliders;

use App\Http\Requests\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateMainSliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'id' => 'required|exists:main_sliders,id,deleted_at,NULL',
            'title_en' => 'required|string|max:191',
            'title_ar' => 'required|string|max:191',
            // 'translations.*.button_text' => 'required|string|max:191',
            // 'translations.*.description' => 'nullable|string|max:65557',
            // 'link' => 'required|url|string|max:191',
            'image' => 'nullable|mimes:jpg,png,jpeg,webp|max:102400'
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
