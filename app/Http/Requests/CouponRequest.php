<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'code'     => 'required|max:255|unique:coupons',
            'amount'     => 'required|numeric',
            'apply_type' => 'required',
            'started_at' => 'date',
            'expired_at' => 'date'
        ];
    }
}
