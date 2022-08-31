<?php

namespace App\Http\Requests\BendPengeluaran;

use Illuminate\Foundation\Http\FormRequest;

class Sp2dGuRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->merge([
            'nilai' => str_replace(',', '', $this->nilai)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tgl' => ['required'],
            'no' => ['required'],
            'no_cek' => ['required'],
            'uraian' => ['required'],
            'nilai' => ['nullable', 'numeric'],
        ];
    }

    // public function passedValidation()
    // {
    // }
}
