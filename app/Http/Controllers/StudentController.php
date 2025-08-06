<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        
        return Inertia::render('siswa/index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return Inertia::render('siswa/create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return redirect()->route('siswa.show', $student)
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified student.
     */
    public function show(Student $student)
    {
        $student->load(['payments', 'classPlacements', 'transferLetters', 'studentCards']);
        
        return Inertia::render('siswa/show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        return Inertia::render('siswa/edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified student in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('siswa.show', $student)
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}