<?php

namespace App\Http\Requests\Setup\Rekening;

use Illuminate\Foundation\Http\FormRequest;

class Rekening1Request extends FormRequest
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
            'kode1' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
        ];
    }
}
