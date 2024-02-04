<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required|max:255,|min:3',
            'media' => 'file|mimes:png,jpg,jpeg,gif,webp|max:20000'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'O campo de mensagem é obrigatório',
            'content.max' => 'O máximo é :max caracteres',
            'content.min' => 'O mínimo é :min caracteres',
            'media.mimes' => 'O tipo de arquivo escolhido é inválido',
            'media.size' => 'O arquivo deve ter 20 MBs'

        ];
    }
}
