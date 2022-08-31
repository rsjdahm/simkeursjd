<?php

namespace App\Http\Requests\Parameter;

use Illuminate\Foundation\Http\FormRequest;

class RekananRequest extends FormRequest
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
            'nama' => ['required'],
            'bentuk_rekanan_id' => ['required', 'numeric'],
            'npwp' => ['nullable'],
            'alamat' => ['required'],
            'nama_pimpinan' => ['required'],
            'nama_rek' => ['required'],
            'no_rek' => ['required'],
            'jenis_bank_id' => ['required', 'numeric'],
            'no_telp' => ['nullable'],
        ];
    }
}
