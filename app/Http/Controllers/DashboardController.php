<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Employmentdata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $currentSemiAnnual = 1;
        $currentYear = now()->year;

        $employmentData = $this->getSemiAnnualData($currentSemiAnnual, $currentYear);


        $alumni = Alumni::count();
        $pendingAlumniCount = Alumni::where('pending', true)->count();
        $employmentdata = Employmentdata::count();

        $employedCount = Employmentdata::where('employment_status', 'Employed')->count();
        $unEmployedCount = Employmentdata::where('employment_status', 'Unemployed')->count();
        $withJobOfferCount = Employmentdata::where('employment_status', 'With Job Offer')->count();

        return view('dashboard.dashboard', compact('alumni', 'pendingAlumniCount', 'employmentdata','employedCount', 'unEmployedCount', 'withJobOfferCount'));
    }

public function getEmploymentData($semiAnnual, $year)
{
    $employmentData = $this->getSemiAnnualData($semiAnnual, $year);

    return response()->json($employmentData);
}

private function getSemiAnnualData($semiAnnual, $year)
{
    $startMonth = $semiAnnual == 1 ? 1 : 7;
    $endMonth = $semiAnnual == 1 ? 6 : 12;

    $employedCount = Employmentdata::where('employment_status', 'Employed')
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', '>=', $startMonth)
                                    ->whereMonth('created_at', '<=', $endMonth)
                                    ->count();
    $unEmployedCount = Employmentdata::where('employment_status', 'Unemployed')
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', '>=', $startMonth)
                                    ->whereMonth('created_at', '<=', $endMonth)
                                    ->count();
    $withJobOfferCount = Employmentdata::where('employment_status', 'With Job Offer')
                                    ->whereYear('created_at', $year)
                                    ->whereMonth('created_at', '>=', $startMonth)
                                    ->whereMonth('created_at', '<=', $endMonth)
                                    ->count();

    return [
        'employedCount' => $employedCount,
        'unEmployedCount' => $unEmployedCount,
        'withJobOfferCount' => $withJobOfferCount,
    ];
}
}
