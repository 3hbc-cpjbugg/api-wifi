<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigSiteRequest extends FormRequest
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
            'primary_color' => 'required|max:255',
            'secondary_color' => 'required|max:255',
            'background_color_login' => 'required|max:255',
            'text_color' => 'required|max:255',
            'accept_button_color' => 'required|max:255',
            'accept_button_text_color' => 'required|max:255',
            'cancel_button_color' => 'required|max:255',
            'cancel_button_text_color' => 'required|max:255',
            'header_color' => 'required|max:255',
            'footer_color' => 'required|max:255',
            'header_table_color' => 'required|max:255',
            'file' => 'file'
        ];
    }
}
