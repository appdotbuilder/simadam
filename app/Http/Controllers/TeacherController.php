<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use Inertia\Inertia;

class TeacherController extends Controller
{
    /**
     * Display a listing of the teachers.
     */
    public function index()
    {
        $teachers = Teacher::with('classTeachers')->latest()->paginate(10);
        
        return Inertia::render('guru/index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return Inertia::render('guru/create');
    }

    /**
     * Store a newly created teacher in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::create($request->validated());

        return redirect()->route('guru.show', $teacher)
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Display the specified teacher.
     */
    public function show(Teacher $teacher)
    {
        $teacher->load('classTeachers');
        
        return Inertia::render('guru/show', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified teacher.
     */
    public function edit(Teacher $teacher)
    {
        return Inertia::render('guru/edit', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified teacher in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());

        return redirect()->route('guru.show', $teacher)
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified teacher from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}