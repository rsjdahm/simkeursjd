<?php

namespace App\Http\Requests\Parameter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PotonganRequest extends FormRequest
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
            'jenis_potongan_id' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
            'kode_map' => ['nullable', 'string'],
            'tarif' => ['nullable', 'numeric'],
            'perhitungan' => ['nullable', 'string'],
            'is_dpp_harga_jual' => ['nullable', 'boolean']
        ];
    }
}
