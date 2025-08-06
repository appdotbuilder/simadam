<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'nip' => 'required|string|unique:teachers,nip,' . $this->route('teacher')->id . '|max:30',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date|before:today',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'bidang_studi' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak_aktif',
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
            'nip.required' => 'NIP guru harus diisi.',
            'nip.unique' => 'NIP ini sudah digunakan oleh guru lain.',
            'nama.required' => 'Nama guru harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus L (Laki-laki) atau P (Perempuan).',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'alamat.required' => 'Alamat guru harus diisi.',
            'bidang_studi.required' => 'Bidang studi/mata pelajaran harus diisi.',
        ];
    }
}