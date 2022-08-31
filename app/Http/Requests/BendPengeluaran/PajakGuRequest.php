<?php

namespace App\Http\Requests\BendPengeluaran;

use Illuminate\Foundation\Http\FormRequest;

class PajakGuRequest extends FormRequest
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
            'dpp' => str_replace(',', '', $this->dpp),
            'nilai' => str_replace(',', '', $this->nilai),
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
            'bukti_gu_id' => ['required', 'numeric'],
            'potongan_id' => ['required', 'numeric'],
            'dpp' => ['required', 'numeric'],
            'nilai' => ['required', 'numeric'],
        ];
    }
}
