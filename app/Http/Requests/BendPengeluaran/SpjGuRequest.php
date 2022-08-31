<?php

namespace App\Http\Requests\BendPengeluaran;

use Illuminate\Foundation\Http\FormRequest;

class SpjGuRequest extends FormRequest
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
            'no' => ['required']
        ];
    }

    // public function passedValidation()
    // {
    // }
}
