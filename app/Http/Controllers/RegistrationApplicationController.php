<?php

namespace App\Http\Controllers;

use App\Models\RegistrationApplication;
use Illuminate\Http\Request;

class RegistrationApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'nisn' => 'required|string|unique:registration_applications,nisn|max:255',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'full_address' => 'required|string',
            'personal_phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'parents_last_education' => 'required|string|max:255',
            'parents_occupation' => 'required|string|max:255',
            'parents_address' => 'nullable|string',
            'parents_phone_number' => 'required|string|max:255',
            'parents_income' => 'nullable|string|max:255',
            'previous_school_name' => 'required|string|max:255',
            'previous_school_npsn' => 'required|string|max:255',
            'previous_school_address' => 'required|string',
            'school_status' => 'required|in:Negeri,Swasta',
            'exam_participant_number' => 'nullable|string|max:255',
            'birth_certificate_filepath' => 'required|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'family_card_filepath' => 'required|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'report_card_filepath' => 'required|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'recent_photo_filepath' => 'required|file|mimes:jpg,jpeg,png|max:15360',
            'achievement_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
            'domicile_certificate_filepath' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:15360',
        ], [
            'full_name.required' => 'Nama lengkap harus diisi.',
            'nisn.required' => 'NISN harus diisi.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'gender.required' => 'Jenis kelamin harus dipilih.',
            'birth_place.required' => 'Tempat lahir harus diisi.',
            'birth_date.required' => 'Tanggal lahir harus diisi.',
            'religion.required' => 'Agama harus diisi.',
            'full_address.required' => 'Alamat lengkap harus diisi.',
            'parents_last_education.required' => 'Pendidikan terakhir orang tua harus diisi.',
            'parents_occupation.required' => 'Pekerjaan orang tua harus diisi.',
            'parents_phone_number.required' => 'Nomor telepon orang tua harus diisi.',
            'previous_school_name.required' => 'Nama sekolah sebelumnya harus diisi.',
            'previous_school_npsn.required' => 'NPSN sekolah sebelumnya harus diisi.',
            'previous_school_address.required' => 'Alamat sekolah sebelumnya harus diisi.',
            'school_status.required' => 'Status sekolah harus dipilih.',
            'birth_certificate_filepath.required' => 'File akta kelahiran harus diunggah.',
            'family_card_filepath.required' => 'File kartu keluarga harus diunggah.',
            'report_card_filepath.required' => 'File rapor harus diunggah.',
            'recent_photo_filepath.required' => 'File foto terbaru harus diunggah.'
        ]);

        try {
            $validatedData['birth_certificate_filepath'] = $request->file('birth_certificate_filepath')->store('uploads/birth_certificates', 'public');
            $validatedData['family_card_filepath'] = $request->file('family_card_filepath')->store('uploads/family_cards', 'public');
            $validatedData['report_card_filepath'] = $request->file('report_card_filepath')->store('uploads/report_cards', 'public');
            $validatedData['recent_photo_filepath'] = $request->file('recent_photo_filepath')->store('uploads/recent_photos', 'public');

            if ($request->hasFile('achievement_certificate_filepath')) {
                $validatedData['achievement_certificate_filepath'] = $request->file('achievement_certificate_filepath')->store('uploads/achievement_certificates', 'public');
            }

            if ($request->hasFile('domicile_certificate_filepath')) {
                $validatedData['domicile_certificate_filepath'] = $request->file('domicile_certificate_filepath')->store('uploads/domicile_certificates', 'public');
            }

            $registrationApplication = new RegistrationApplication($validatedData);
            $registrationApplication->save();

            return redirect()->route('registration.success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function showSuccess()
    {
        return view('registration-success');
    }
}
