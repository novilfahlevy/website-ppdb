<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class ArchivedRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::archived();
        
        // Search by keyword across multiple columns
        if ($request->has('cari') && $request->cari) {
            $keyword = $request->cari;
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                  ->orWhere('academic_year', 'like', '%' . $keyword . '%')
                  ->orWhere('slug', 'like', '%' . $keyword . '%');
            });
        }
        
        $registrations = $query->paginate(10)->withQueryString();
        
        return view('admin.archived-registration.index', compact('registrations'));
    }
}
