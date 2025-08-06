<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\Student;
use Inertia\Inertia;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Payment::with('student')->latest()->paginate(10);
        
        return Inertia::render('pembayaran/index', [
            'payments' => $payments
        ]);
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        $students = Student::active()->select('id', 'nis', 'nama')->get();
        
        return Inertia::render('pembayaran/create', [
            'students' => $students
        ]);
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->validated());

        return redirect()->route('pembayaran.show', $payment)
            ->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    /**
     * Display the specified payment.
     */
    public function show(Payment $payment)
    {
        $payment->load('student');
        
        return Inertia::render('pembayaran/show', [
            'payment' => $payment
        ]);
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit(Payment $payment)
    {
        $payment->load('student');
        $students = Student::active()->select('id', 'nis', 'nama')->get();
        
        return Inertia::render('pembayaran/edit', [
            'payment' => $payment,
            'students' => $students
        ]);
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());

        return redirect()->route('pembayaran.show', $payment)
            ->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }
}