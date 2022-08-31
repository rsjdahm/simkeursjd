<?php

namespace App\Http\Requests\Setup\Rekening;

use Illuminate\Foundation\Http\FormRequest;

class Rekening3Request extends FormRequest
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
            'rekening2_id' => ['required', 'numeric'],
            'kode1' => ['required', 'numeric'],
            'kode2' => ['required', 'numeric'],
            'kode3' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
        ];
    }
}
