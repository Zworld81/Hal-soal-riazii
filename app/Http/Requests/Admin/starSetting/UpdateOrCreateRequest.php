<?php

namespace App\Http\Requests\Admin\starSetting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrCreateRequest extends FormRequest
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
            'default_stars' => ['required'],
            'per_question_star' => ['required'],
            'per_support_star' => ['required'],
            'per_answer_star' => ['required'],
            'star_price' => ['required'],
            'give_gift_star_on_register' => ['required'],
        ];
    }
}
