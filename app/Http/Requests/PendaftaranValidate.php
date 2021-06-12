<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_bpjs' => 'nullable',
            'nama' => 'required|string',
            'nama_bpk' => 'nullable',
            'nama_ibu' => 'nullable',
            'tgl_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'rt_rw' => 'nullable',
            'bb_lahir' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/'],
            'tb_lahir' => ['nullable', 'regex:/^\d+(\.\d{1,2})?$/']
        ];
    }
}
