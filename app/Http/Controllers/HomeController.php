<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $registrations = Registration::unarchived()->get();
        $fee = Fee::first();
        return view('index', compact('registrations', 'fee'));
    }

    public function registration(string $slug, $academicYear)
    {
        $registration = Registration::unarchived()
            ->where('academic_year', str_replace('-', '/', $academicYear))
            ->where('slug', $slug)
            ->firstOrFail();

        // Cek apakah pendaftaran ditutup
        if (!$registration->is_open) {
            return view('registration-closed', compact('registration'));
        }

        return view('registration', compact('registration'));
    }
}
