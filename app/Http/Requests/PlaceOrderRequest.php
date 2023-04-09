<?php

namespace App\Http\Requests;

use App\Http\Requests\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order' => 'required|array',
            'order.address' => 'required|array',
            "order.address.email" => "required|email",
            "order.address.country_id" => 'required|exists:locations,id',
            "order.address.first_name" => "required|string|max:191",
            "order.address.last_name" => "required|string|max:191",
            "order.address.address" => "required|string|max:66665",
            "order.address.apartment" => "nullable|string|max:191",
            "order.address.city" => "required|string|max:191",
            "order.address.postal_code" => "nullable|string|max:191",
            "order.address.phone_number" => array("required", 'regex:/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/'),
            "order.shipping_method_id" => 'required|exists:shipping_methods,id',
            "order.payment_method_id" => 'required|exists:payment_methods,id'
        ];
    }
}
