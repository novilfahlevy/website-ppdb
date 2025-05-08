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
        $registrations = Registration::unarchived()->paginate(10);
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
            'name' => 'required|string|max:255|unique:registrations,name,NULL,id,academic_year,' . $request->academic_year,
            'academic_year' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_open' => 'required|boolean'
        ], [
            'name.required' => 'Nama pendaftaran harus diisi.',
            'name.unique' => 'Pendaftaran dengan nama ini sudah ada pada tahun ajaran yang sama.',
            'academic_year.required' => 'Tahun ajaran harus diisi.',
            'end_date.after_or_equal' => 'Tanggal akhir pendaftaran harus setelah atau sama dengan tanggal mulai pendaftaran.',
            'is_open.required' => 'Status pendaftaran harus diisi.',
            'is_open.boolean' => 'Status pendaftaran harus berupa true atau false.'
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

    public function editApplication(string $id)
    {
        $application = RegistrationApplication::findOrFail($id);
        return view('admin.registration.edit-application', compact('application'));
    }

    public function updateApplication(Request $request, string $id)
    {
        $application = RegistrationApplication::findOrFail($id);
        
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:registration_applications,nisn,' . $id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'full_address' => 'required|string',
            'personal_phone_number' => 'required|string|max:255',
            'current_domicile' => 'required|string',
            'email' => 'nullable|email|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'parents_last_education' => 'required|string|max:255',
            'parents_occupation' => 'required|string|max:255',
            'parents_occupation_other' => 'required_if:parents_occupation,Lainnya|string|max:255',
            'parents_address' => 'nullable|string',
            'parents_phone_number' => 'required|string|max:255',
            'parents_income' => 'nullable|string|max:255',
            'previous_school_name' => 'required|string|max:255',
            'previous_school_address' => 'required|string',
            'school_status' => 'required|in:Negeri,Swasta',
            'exam_participant_number' => 'nullable|string|max:255',
        ]);

        try {
            $application->update($validatedData);

            return redirect()
                ->route('registrations.application', $id)
                ->with('success', 'Data pendaftaran berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
            'name' => 'required|string|max:255|unique:registrations,name,' . $id . ',id,academic_year,' . $request->academic_year,
            'academic_year' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_open' => 'required|boolean'
        ], [
            'name.required' => 'Nama pendaftaran harus diisi.',
            'name.unique' => 'Pendaftaran dengan nama ini sudah ada pada tahun ajaran yang sama.',
            'academic_year.required' => 'Tahun ajaran harus diisi.',
            'end_date.after_or_equal' => 'Tanggal akhir pendaftaran harus setelah atau sama dengan tanggal mulai pendaftaran.',
            'is_open.required' => 'Status pendaftaran harus diisi.',
            'is_open.boolean' => 'Status pendaftaran harus berupa true atau false.'
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

    public function archive(string $id)
    {
        $registration = Registration::unarchived()->findOrFail($id);
        $registration->update(['is_archived' => true, 'is_open' => false]);

        return redirect()
            ->route('registrations.index')
            ->with('success', 'Pendaftaran berhasil diarsipkan.');
    }

    public function unarchive(string $id)
    {
        $registration = Registration::archived()->findOrFail($id);
        $registration->update(['is_archived' => false]);

        return redirect()
            ->route('registrations.index')
            ->with('success', 'Pendaftaran berhasil dikeluarkan dari arsip kembali.');
    }
}
