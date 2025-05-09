<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Key statistics
        $unarchivedRegistrations = Registration::unarchived()->count();
        $totalUnarchivedApplications = RegistrationApplication::query()
            ->whereHas('registration', fn ($query) => $query->unarchived())
            ->count();
        
        // Get applications for current academic year
        $currentApplications = RegistrationApplication::where('created_at', '>=', Carbon::now()->startOfYear())
            ->where('created_at', '<=', Carbon::now()->endOfYear())
            ->count();

        // Recent applications (last 7 days)
        $recentApplications = RegistrationApplication::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        
        // Latest 5 applications
        $latestApplications = RegistrationApplication::with('registration')
            ->latest()
            ->take(5)
            ->get();
        
        // Active registrations
        $openRegistrations = Registration::unarchived()
            ->where('is_open', true)
            ->take(5)
            ->get();
            
        // Gender distribution
        $maleCount = RegistrationApplication::where('gender', 'Laki-laki')->count();
        $femaleCount = RegistrationApplication::where('gender', 'Perempuan')->count();
        
        // Applications by registration period
        $applicationsByRegistration = Registration::withCount('applications')
            ->orderBy('academic_year', 'desc')
            ->take(5)
            ->get();
            
        // Return data to the view
        return view('admin.index', compact(
            'unarchivedRegistrations',
            'totalUnarchivedApplications',
            'currentApplications',
            'recentApplications',
            'latestApplications',
            'openRegistrations',
            'maleCount',
            'femaleCount',
            'applicationsByRegistration'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
