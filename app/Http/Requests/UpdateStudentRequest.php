<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => 'required|string|unique:students,nis,' . $this->route('student')->id . '|max:20',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date|before:today',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_orang_tua' => 'required|string|max:255',
            'no_telepon_orang_tua' => 'nullable|string|max:20',
            'kelas' => 'required|string|max:10',
            'status' => 'required|in:aktif,tidak_aktif,mutasi',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nis.required' => 'NIS siswa harus diisi.',
            'nis.unique' => 'NIS ini sudah digunakan oleh siswa lain.',
            'nama.required' => 'Nama siswa harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus L (Laki-laki) atau P (Perempuan).',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'alamat.required' => 'Alamat siswa harus diisi.',
            'nama_orang_tua.required' => 'Nama orang tua/wali harus diisi.',
            'kelas.required' => 'Kelas harus diisi.',
        ];
    }
}