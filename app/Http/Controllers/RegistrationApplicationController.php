<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistrationApplicationController extends Controller
{
    public function store(Request $request, string $slug)
    {
        try {
            // If parents_occupation is not 'Lainnya', remove parents_occupation_other from request
            if ($request->has('parents_occupation') && $request->input('parents_occupation') !== 'Lainnya') {
                $request->request->remove('parents_occupation_other');
            }

            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'nisn' => 'required|string|unique:registration_applications,nisn|max:255',
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
                'parents_occupation_other' => 'required_if:parents_occupation,Lainnya|nullable|string|max:255',
                'parents_address' => 'nullable|string',
                'parents_phone_number' => 'required|string|max:255',
                'parents_income' => 'nullable|string|max:255',
                'previous_school_name' => 'required|string|max:255',
                'previous_school_address' => 'required|string',
                'school_status' => 'required|in:Negeri,Swasta',
                'exam_participant_number' => 'nullable|string|max:255',
                'birth_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
                'family_card_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
                'report_card_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
                'recent_photo_filepath' => 'nullable|file|mimes:jpg,jpeg,png|max:15360',
                'achievement_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
                'domicile_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
                'proof_of_payment_filepath' => 'required|file|mimes:jpg,jpeg,png,pdf|max:15360',
            ], [
                'full_name.required' => 'Nama lengkap harus diisi.',
                'full_name.string' => 'Nama lengkap harus berupa teks.',
                'nisn.required' => 'NISN harus diisi.',
                'nisn.string' => 'NISN harus berupa teks.',
                'nisn.unique' => 'NISN sudah terdaftar.',
                'gender.required' => 'Jenis kelamin harus dipilih.',
                'gender.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
                'birth_place.required' => 'Tempat lahir harus diisi.',
                'birth_place.string' => 'Tempat lahir harus berupa teks.',
                'birth_date.required' => 'Tanggal lahir harus diisi.',
                'birth_date.date' => 'Format tanggal lahir tidak valid.',
                'religion.required' => 'Agama harus diisi.',
                'religion.string' => 'Agama harus berupa teks.',
                'full_address.required' => 'Alamat lengkap harus diisi.',
                'full_address.string' => 'Alamat lengkap harus berupa teks.',
                'current_domicile.required' => 'Domisili sekarang harus diisi.',
                'current_domicile.string' => 'Domisili sekarang harus berupa teks.',
                'personal_phone_number.required' => 'Nomor telepon harus diisi.',
                'personal_phone_number.string' => 'Nomor telepon harus berupa teks.',
                'email.email' => 'Format email tidak valid.',
                'father_name.required' => 'Nama ayah harus diisi.',
                'father_name.string' => 'Nama ayah harus berupa teks.',
                'mother_name.required' => 'Nama ibu harus diisi.',
                'mother_name.string' => 'Nama ibu harus berupa teks.',
                'parents_last_education.required' => 'Pendidikan terakhir orang tua harus diisi.',
                'parents_last_education.string' => 'Pendidikan terakhir orang tua harus berupa teks.',
                'parents_occupation.required' => 'Pekerjaan orang tua harus diisi.',
                'parents_occupation.string' => 'Pekerjaan orang tua harus berupa teks.',
                'parents_occupation_other.required_if' => 'Pekerjaan lainnya harus diisi jika memilih Lainnya.',
                'parents_occupation_other.string' => 'Pekerjaan lainnya harus berupa teks.',
                'parents_address.string' => 'Alamat orang tua harus berupa teks.',
                'parents_phone_number.required' => 'Nomor telepon orang tua harus diisi.',
                'parents_phone_number.string' => 'Nomor telepon orang tua harus berupa teks.',
                'parents_income.string' => 'Penghasilan orang tua harus berupa teks.',
                'previous_school_name.required' => 'Nama sekolah sebelumnya harus diisi.',
                'previous_school_name.string' => 'Nama sekolah sebelumnya harus berupa teks.',
                'previous_school_address.required' => 'Alamat sekolah sebelumnya harus diisi.',
                'previous_school_address.string' => 'Alamat sekolah sebelumnya harus berupa teks.',
                'school_status.required' => 'Status sekolah harus dipilih.',
                'school_status.in' => 'Status sekolah harus Negeri atau Swasta.',
                'exam_participant_number.string' => 'Nomor peserta ujian harus berupa teks.',
                
                'proof_of_payment_filepath.required' => 'Bukti pembayaran harus diunggah.',
                'proof_of_payment_filepath.file' => 'Bukti pembayaran harus berupa file.',
                'proof_of_payment_filepath.mimes' => 'File bukti pembayaran harus berupa jpg, jpeg, png, atau pdf.',
                'proof_of_payment_filepath.max' => 'Ukuran file bukti pembayaran maksimal 15 MB.',
                
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
            ]);

            // Check if the registration exists and is open
            $registration = Registration::query()
                ->where('slug', $slug)
                ->where('is_open', true)
                ->first();

            if (!$registration) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Pendaftaran tidak ditemukan atau sudah ditutup.');
            }
            
            // Handle file uploads
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
            
            // Create and save the application
            $application = new RegistrationApplication($validatedData);
            $application->registration()->associate($registration);
            $application->save();

            return redirect()->route('registration.success', ['nisn' => $validatedData['nisn'], 'pendaftaran' => $slug]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . json_encode($e->errors()));
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $application = RegistrationApplication::findOrFail($id);
        return view('admin.registration.edit-application', compact('application'));
    }

    public function update(Request $request, string $id)
    {
        $application = RegistrationApplication::findOrFail($id);
        
        // If parents_occupation is not 'Lainnya', remove parents_occupation_other from request
        if ($request->has('parents_occupation') && $request->input('parents_occupation') !== 'Lainnya') {
            $request->request->remove('parents_occupation_other');
        }
        
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
            'parents_occupation_other' => 'required_if:parents_occupation,Lainnya|nullable|string|max:255',
            'parents_address' => 'nullable|string',
            'parents_phone_number' => 'required|string|max:255',
            'parents_income' => 'nullable|string|max:255',
            'previous_school_name' => 'required|string|max:255',
            'previous_school_address' => 'required|string',
            'school_status' => 'required|in:Negeri,Swasta',
            'exam_participant_number' => 'nullable|string|max:255',
            'birth_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'family_card_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'report_card_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'recent_photo_filepath' => 'nullable|file|mimes:jpg,jpeg,png|max:15360',
            'achievement_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'domicile_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'proof_of_payment_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
        ], [
            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'nisn.required' => 'NISN harus diisi.',
            'nisn.string' => 'NISN harus berupa teks.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'gender.required' => 'Jenis kelamin harus dipilih.',
            'gender.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'birth_place.required' => 'Tempat lahir harus diisi.',
            'birth_place.string' => 'Tempat lahir harus berupa teks.',
            'birth_date.required' => 'Tanggal lahir harus diisi.',
            'birth_date.date' => 'Format tanggal lahir tidak valid.',
            'religion.required' => 'Agama harus diisi.',
            'religion.string' => 'Agama harus berupa teks.',
            'full_address.required' => 'Alamat lengkap harus diisi.',
            'full_address.string' => 'Alamat lengkap harus berupa teks.',
            'current_domicile.required' => 'Domisili sekarang harus diisi.',
            'current_domicile.string' => 'Domisili sekarang harus berupa teks.',
            'personal_phone_number.required' => 'Nomor telepon harus diisi.',
            'personal_phone_number.string' => 'Nomor telepon harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'father_name.required' => 'Nama ayah harus diisi.',
            'father_name.string' => 'Nama ayah harus berupa teks.',
            'mother_name.required' => 'Nama ibu harus diisi.',
            'mother_name.string' => 'Nama ibu harus berupa teks.',
            'parents_last_education.required' => 'Pendidikan terakhir orang tua harus diisi.',
            'parents_last_education.string' => 'Pendidikan terakhir orang tua harus berupa teks.',
            'parents_occupation.required' => 'Pekerjaan orang tua harus diisi.',
            'parents_occupation.string' => 'Pekerjaan orang tua harus berupa teks.',
            'parents_occupation_other.required_if' => 'Pekerjaan lainnya harus diisi jika memilih Lainnya.',
            'parents_occupation_other.string' => 'Pekerjaan lainnya harus berupa teks.',
            'parents_address.string' => 'Alamat orang tua harus berupa teks.',
            'parents_phone_number.required' => 'Nomor telepon orang tua harus diisi.',
            'parents_phone_number.string' => 'Nomor telepon orang tua harus berupa teks.',
            'parents_income.string' => 'Penghasilan orang tua harus berupa teks.',
            'previous_school_name.required' => 'Nama sekolah sebelumnya harus diisi.',
            'previous_school_name.string' => 'Nama sekolah sebelumnya harus berupa teks.',
            'previous_school_address.required' => 'Alamat sekolah sebelumnya harus diisi.',
            'previous_school_address.string' => 'Alamat sekolah sebelumnya harus berupa teks.',
            'school_status.required' => 'Status sekolah harus dipilih.',
            'school_status.in' => 'Status sekolah harus Negeri atau Swasta.',
            'exam_participant_number.string' => 'Nomor peserta ujian harus berupa teks.',
        ]);

        try {
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
                ->with('success', 'Data pendaftaran berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Update registration error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function showSuccess(Request $request)
    {
        // TODO: Nanti sesuaikan lagi
        $nisn = $request->query('nisn');
        $registrationName = $request->query('pendaftaran');

        $application = RegistrationApplication::query()
            ->whereHas('registration', function ($query) use ($registrationName) {
                $query->where('slug', $registrationName);
            })
            ->where('nisn', $nisn)
            ->first();

        if (!$application) {
            abort(404);
        }

        return view('registration-success');
    }
}
