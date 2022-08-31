<?php

namespace App\Http\Requests\Parameter;

use Illuminate\Foundation\Http\FormRequest;

class BankTujuanRequest extends FormRequest
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
            'jenis_bank_id' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
            'no_rek' => ['required', 'string']
        ];
    }
}
