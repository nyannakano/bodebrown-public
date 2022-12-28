<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosFormRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
            'pro_name' => 'required',
            'pro_price' => 'required',
            'pro_image' => 'mimes:jpeg,jpg,png'
        ];
    }

    public function messages(){
        return [
            'pro_name.required' => 'Campo nome é obrigatório',
            'pro_price.required' => 'Campo preço é obrigatório',
            'pro_image.mimes' => 'A imagem precisa estar nos formatos: jpeg, jpg ou png'
        ];
    }
}
