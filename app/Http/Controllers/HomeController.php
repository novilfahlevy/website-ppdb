<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $registrations = Registration::unarchived()->get();
        return view('index', compact('registrations'));
    }

    public function registration(string $slug)
    {
        $registration = Registration::unarchived()->where('slug', $slug)->firstOrFail();

        // Cek apakah pendaftaran ditutup
        if (!$registration->is_open) {
            return view('registration-closed', compact('registration'));
        }

        return view('registration', compact('registration'));
    }
}
