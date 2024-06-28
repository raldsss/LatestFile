<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Employmentdata;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmploymentdataController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'batchNumber' => 'nullable|string',
            'name' => 'required',
            'employment_status' => 'required',
            'company_name' => 'nullable|string',
            'job_title' => 'nullable|string',
            'location' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        // $currentMonth = date('m');
        // $currentYear = date('Y');

        // $existingEntry = Employmentdata::whereMonth('created_at', $currentMonth)
        //                                ->whereYear('created_at', $currentYear)
        //                                ->exists();

        //     if ($existingEntry) {
        //     return redirect()->back()->with('error', 'You have already submitted data for this month.');
        // }


        // $employmentdata = Employmentdata::create($request->all());

        // Alert::success('Success', 'You successfully submitted!');
        // return redirect()->route('response')->with('success', 'You successfully submitted!');
        $employmentdata = Employmentdata::create($request->all());

        Alert::success('Success', 'You Successfully submitted !');
        return redirect()->route('response')->with('success', 'You Successfully submitted !');
    }

    public function index(Request $request)
    {
        $alumni = Alumni::all();
        $employmentdata = Employmentdata::query();

        // Filter by batch number
        if ($request->filled('batchNumber')) {
            $employmentdata->where('batchNumber', $request->input('batchNumber'));
        }

        // Filter by employment status
        if ($request->filled('employment_status')) {
            $employmentdata->where('employment_status', $request->input('employment_status'));
        }

        // Filter by created_at month
        if ($request->filled('filter_month')) {
            $filterMonth = $request->input('filter_month');
            $employmentdata->whereYear('created_at', substr($filterMonth, 0, 4))
                           ->whereMonth('created_at', substr($filterMonth, 5, 2));
        }

        $employmentdata = $employmentdata->get();

        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        // Generate list of years (adjust this as per your application's needs)
        $currentYear = date('Y');
        $years = range($currentYear, $currentYear - 10); // This gives you 10 years from current year

        return view('employmentdata.employmentdata', compact('alumni', 'employmentdata', 'months', 'years'));
    }



    public function edit($emp_id)
    {
        $employmentdata = Employmentdata::findOrFail($emp_id);

        return view('employmentdata.employmentdata-edit', [
            'employmentdata' => $employmentdata,
        ]);
    }



    public function update(Request $request, $emp_id)
    {
        $validated = $request->validate([
            'batchNumber' => 'nullable|string',
            'name' => 'required|string',
            'employment_status' => 'required|string',
            'company_name' => 'nullable|string',
            'job_title' => 'nullable|string',
            'location' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        $employmentdataToUpdate = Employmentdata::findOrFail($emp_id);
        $employmentdataToUpdate->update($validated);

        Alert::info('Success', 'Employment Data has been updated!');
        return redirect()->route('employmentdata.index');
    }
}
