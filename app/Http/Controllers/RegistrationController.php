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
            ->paginate(20);

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
            'birth_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'family_card_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'report_card_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'recent_photo_filepath' => 'nullable|file|mimes:jpg,jpeg,png|max:15360',
            'achievement_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'domicile_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'proof_of_payment_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
        ], [
            'birth_certificate_filepath.file' => 'Akta kelahiran harus berupa file.',
            'birth_certificate_filepath.mimes' => 'File akta kelahiran harus berupa jpg, jpeg, png, atau pdf.',
            'birth_certificate_filepath.max' => 'Ukuran file akta kelahiran maksimal 15 MB.',
            
            'family_card_filepath.file' => 'Kartu keluarga harus berupa file.',
            'family_card_filepath.mimes' => 'File kartu keluarga harus berupa jpg, jpeg, png, atau pdf.',
            'family_card_filepath.max' => 'Ukuran file kartu keluarga maksimal 15 MB.',
            
            'report_card_filepath.file' => 'Rapor harus berupa file.',
            'report_card_filepath.mimes' => 'File rapor harus berupa jpg, jpeg, png, atau pdf.',
            'report_card_filepath.max' => 'Ukuran file rapor maksimal 15 MB.',
            
            'recent_photo_filepath.file' => 'Foto terbaru harus berupa file.',
            'recent_photo_filepath.mimes' => 'File foto terbaru harus berupa jpg, jpeg, atau png.',
            'recent_photo_filepath.max' => 'Ukuran file foto terbaru maksimal 15 MB.',
            
            'achievement_certificate_filepath.file' => 'Sertifikat prestasi harus berupa file.',
            'achievement_certificate_filepath.mimes' => 'File sertifikat prestasi harus berupa jpg, jpeg, png, atau pdf.',
            'achievement_certificate_filepath.max' => 'Ukuran file sertifikat prestasi maksimal 15 MB.',
            
            'domicile_certificate_filepath.file' => 'Surat keterangan domisili harus berupa file.',
            'domicile_certificate_filepath.mimes' => 'File surat keterangan domisili harus berupa jpg, jpeg, png, atau pdf.',
            'domicile_certificate_filepath.max' => 'Ukuran file surat keterangan domisili maksimal 15 MB.',
            
            'proof_of_payment_filepath.file' => 'Bukti pembayaran harus berupa file.',
            'proof_of_payment_filepath.mimes' => 'File bukti pembayaran harus berupa jpg, jpeg, png, atau pdf.',
            'proof_of_payment_filepath.max' => 'Ukuran file bukti pembayaran maksimal 15 MB.',
        ]);

        try {
            // Only process file uploads
            if ($request->hasFile('birth_certificate_filepath')) {
                $validatedData['birth_certificate_filepath'] = $request->file('birth_certificate_filepath')->store('uploads/birth_certificates', 'public');
            }

            if ($request->hasFile('family_card_filepath')) {
                $validatedData['family_card_filepath'] = $request->file('family_card_filepath')->store('uploads/family_cards', 'public');
            }

            if ($request->hasFile('report_card_filepath')) {
                $validatedData['report_card_filepath'] = $request->file('report_card_filepath')->store('uploads/report_cards', 'public');
            }

            if ($request->hasFile('recent_photo_filepath')) {
                $validatedData['recent_photo_filepath'] = $request->file('recent_photo_filepath')->store('uploads/recent_photos', 'public');
            }

            if ($request->hasFile('proof_of_payment_filepath')) {
                $validatedData['proof_of_payment_filepath'] = $request->file('proof_of_payment_filepath')->store('uploads/proof_of_payments', 'public');
            }

            if ($request->hasFile('achievement_certificate_filepath')) {
                $validatedData['achievement_certificate_filepath'] = $request->file('achievement_certificate_filepath')->store('uploads/achievement_certificates', 'public');
            }

            if ($request->hasFile('domicile_certificate_filepath')) {
                $validatedData['domicile_certificate_filepath'] = $request->file('domicile_certificate_filepath')->store('uploads/domicile_certificates', 'public');
            }

            $application->update($validatedData);

            return redirect()
                ->route('registrations.application', $id)
                ->with('success', 'Dokumen pendaftaran berhasil diperbarui');
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
