<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationApplication;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::all();
        return view('admin.registration.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.registration.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_open' => 'required|boolean'
        ]);

        Registration::create($validated);

        return redirect()
            ->route('registrations.index')
            ->with('success', 'Pendaftaran berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registration = Registration::findOrFail($id);

        $search = request('cari');
        $applications = $registration->applications()
            ->when($search, function ($query, $search) {
                $query->where('full_name', 'like', "%{$search}%")
                      ->orWhere('nisn', 'like', "%{$search}%")
                      ->orWhere('personal_phone_number', 'like', "%{$search}%")
                      ->orWhere('gender', 'like', "%{$search}%")
                      ->orWhere('previous_school_name', 'like', "%{$search}%");
            })
            ->get();

        return view('admin.registration.show', compact('registration', 'applications'));
    }

    public function showApplication(string $id)
    {
        $application = RegistrationApplication::findOrFail($id);
        return view('admin.registration.show-application', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.registration.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_open' => 'required|boolean'
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update($validated);

        return redirect()
            ->route('registrations.index')
            ->with('success', 'Pendaftaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()
            ->route('registrations.index')
            ->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
