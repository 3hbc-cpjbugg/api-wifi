<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSiteRequest extends FormRequest
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
            'nombre_sitio' => 'required|string',
            'calle_sitio' => 'required|string',
            'numero_sitio' => 'required|numeric',
            'colonia_sitio' => 'required|string',
            'municipio_sitio' => 'required|string',
            'estado_sitio' => 'required|string',
            'cp_sitio' => [
                'required',
                Rule::exists('codigos_postales', 'd_codigo')
            ],
            'latitud_sitio' => 'required|string',
            'longitud_sitio' => 'required|string',
        ];
    }
}
