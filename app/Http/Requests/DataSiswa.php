<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSiswa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:siswa,email',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'kebutuhan_khusus' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'no_tlp_sekolah' => 'required',
            'nama_orangtua' => 'required',
            'tlp_orangtua' => 'required',
            'alamat_rumah' => 'required',
            'akta_kk' => 'required',
            'kriteria' => 'required'
        ];
    }
}
