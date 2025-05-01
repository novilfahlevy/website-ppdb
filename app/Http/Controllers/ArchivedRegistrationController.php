<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class ArchivedRegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::archived()->get();
        return view('admin.archived-registration.index', compact('registrations'));
    }
}
