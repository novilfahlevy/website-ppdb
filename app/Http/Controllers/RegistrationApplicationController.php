<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationApplication;
use Illuminate\Http\Request;

class RegistrationApplicationController extends Controller
{
    public function store(Request $request, string $slug)
    {
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
            'parents_occupation_other' => 'required_if:parents_occupation,Lainnya|string|max:255',
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
            'nisn.required' => 'NISN harus diisi.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'gender.required' => 'Jenis kelamin harus dipilih.',
            'birth_place.required' => 'Tempat lahir harus diisi.',
            'birth_date.required' => 'Tanggal lahir harus diisi.',
            'religion.required' => 'Agama harus diisi.',
            'full_address.required' => 'Alamat lengkap harus diisi.',
            'current_domicile.required' => 'Domisili sekarang harus diisi.',
            'personal_phone_number.required' => 'Nomor telepon harus diisi.',
            'father_name.required' => 'Nama ayah harus diisi.',
            'mother_name.required' => 'Nama ibu harus diisi.',
            'parents_last_education.required' => 'Pendidikan terakhir orang tua harus diisi.',
            'parents_occupation.required' => 'Pekerjaan orang tua harus diisi.',
            'parents_occupation_other.required_if' => 'Pekerjaan lainnya harus diisi jika memilih Lainnya.',
            'parents_phone_number.required' => 'Nomor telepon orang tua harus diisi.',
            'previous_school_name.required' => 'Nama sekolah sebelumnya harus diisi.',
            'previous_school_address.required' => 'Alamat sekolah sebelumnya harus diisi.',
            'school_status.required' => 'Status sekolah harus dipilih.',
            'proof_of_payment_filepath.required' => 'Bukti pembayaran harus diunggah.',
            'birth_certificate_filepath.max' => 'Ukuran file akta kelahiran maksimal 15 MB.',
            'birth_certificate_filepath.mimes' => 'File akta kelahiran harus berupa jpg, jpeg, png, atau pdf.',
            'family_card_filepath.max' => 'Ukuran file kartu keluarga maksimal 15 MB.',
            'family_card_filepath.mimes' => 'File kartu keluarga harus berupa jpg, jpeg, png, atau pdf.',
            'report_card_filepath.max' => 'Ukuran file rapor maksimal 15 MB.',
            'report_card_filepath.mimes' => 'File rapor harus berupa jpg, jpeg, png, atau pdf.',
            'recent_photo_filepath.max' => 'Ukuran file foto terbaru maksimal 15 MB.',
            'recent_photo_filepath.mimes' => 'File foto terbaru harus berupa jpg, jpeg, png.',
            'achievement_certificate_filepath.max' => 'Ukuran file sertifikat prestasi maksimal 15 MB.',
            'achievement_certificate_filepath.mimes' => 'File sertifikat prestasi harus berupa jpg, jpeg, png, atau pdf.',
            'domicile_certificate_filepath.max' => 'Ukuran file surat keterangan domisili maksimal 15 MB.',
            'domicile_certificate_filepath.mimes' => 'File surat keterangan domisili harus berupa jpg, jpeg, png, atau pdf.',
            'proof_of_payment_filepath.max' => 'Ukuran file bukti pembayaran maksimal 15 MB.',
            'proof_of_payment_filepath.mimes' => 'File bukti pembayaran harus berupa jpg, jpeg, png, atau pdf.',
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

            // Ambil pendaftaran yang sedang dibuka
            $registration = Registration::query()
                ->where('slug', $slug)
                ->where('is_open', true)
                ->first();
            
            $application = new RegistrationApplication($validatedData);
            $application->registration()->associate($registration);
            $application->save();

            return redirect()->route('registration.success');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function showSuccess()
    {
        return view('registration-success');
    }
}
