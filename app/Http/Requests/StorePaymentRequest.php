<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'bulan' => 'required|string|size:7|regex:/^\d{4}-\d{2}$/',
            'jumlah' => 'required|numeric|min:0|max:999999999.99',
            'tanggal_bayar' => 'required|date|before_or_equal:today',
            'status' => 'required|in:lunas,belum_lunas',
            'keterangan' => 'nullable|string',
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
            'student_id.required' => 'Siswa harus dipilih.',
            'student_id.exists' => 'Siswa yang dipilih tidak valid.',
            'bulan.required' => 'Bulan pembayaran harus diisi.',
            'bulan.size' => 'Format bulan harus YYYY-MM.',
            'bulan.regex' => 'Format bulan harus YYYY-MM (contoh: 2024-01).',
            'jumlah.required' => 'Jumlah pembayaran harus diisi.',
            'jumlah.numeric' => 'Jumlah pembayaran harus berupa angka.',
            'jumlah.min' => 'Jumlah pembayaran tidak boleh kurang dari 0.',
            'tanggal_bayar.required' => 'Tanggal pembayaran harus diisi.',
            'tanggal_bayar.before_or_equal' => 'Tanggal pembayaran tidak boleh di masa depan.',
            'status.required' => 'Status pembayaran harus dipilih.',
            'status.in' => 'Status pembayaran harus lunas atau belum_lunas.',
        ];
    }
}