<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Payment;
use App\Models\Letter;
use App\Models\SchoolProfile;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SimadamController extends Controller
{
    /**
     * Display the main dashboard.
     */
    public function index()
    {
        // Get statistics for dashboard
        $stats = [
            'total_students' => Student::active()->count(),
            'total_teachers' => Teacher::active()->count(),
            'total_payments' => Payment::whereMonth('tanggal_bayar', now()->month)->count(),
            'pending_letters' => Letter::where('jenis', 'masuk')->whereNull('tanggal_diterima')->count(),
        ];

        return Inertia::render('dashboard', [
            'stats' => $stats
        ]);
    }

    /**
     * Display the school profile page.
     */
    public function show()
    {
        $profile = SchoolProfile::first();
        
        return Inertia::render('profil/index', [
            'profile' => $profile
        ]);
    }
}