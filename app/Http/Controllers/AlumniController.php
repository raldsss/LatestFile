<?php

namespace App\Http\Controllers;

use App\Imports\AlumnisImport;
use App\Models\Alumni;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Carbon\Carbon;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $alumni = Alumni::query();

        if ($request->filled('batchNumber')) {
            $alumni->where('batchNumber', $request->input('batchNumber'));
        }

        if ($request->filled('city')) {
            $alumni->where('city', $request->input('city'));
        }

        if ($request->filled('filter_month')) {
            $filterMonth = $request->input('filter_month');
            $alumni->whereYear('created_at', substr($filterMonth, 0, 4))
                   ->whereMonth('created_at', substr($filterMonth, 5, 2));
        }

        $alumni = $alumni->orderBy('created_at', 'desc')->orderBy('firstName', 'asc')->get();

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

        $currentYear = date('Y');
        $years = range($currentYear, $currentYear - 10);

        $selectedBatchNumber = $request->input('batchNumber');
        $selectedCity = $request->input('city');
        $selectedFilterMonth = $request->input('filter_month');

        return view('alumni.alumni', compact('alumni', 'months', 'years', 'selectedBatchNumber', 'selectedCity', 'selectedFilterMonth'));
    }

    public function create()
    {
        return view('alumni.alumni-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'streetAddress' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'district' => 'required',
            'province' => 'required',
            'region' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email',
            'batchNumber' => 'required',
            'training_status' => 'required',
            'scholarship' => 'required',
        ]);

        $existingAlumni = Alumni::where([
            'firstName' => $validated['firstName'],
            'middleName' => $validated['middleName'],
            'lastName' => $validated['lastName'],
        ])->first();

        if ($existingAlumni) {
            Alert::error('Error', 'Alumni with the same name already exists!');
            return back()->withInput();
        }

        Alumni::create($validated);

        Alert::success('Success', 'Alumni has been saved!');
        return redirect('/alumni');
    }

    public function show(Alumni $alumni)
    {
        //
    }

    public function edit($alumni_id)
    {
        $alumni = Alumni::findOrFail($alumni_id);

        return view('alumni.alumni-edit', [
            'alumni' => $alumni,
        ]);
    }

    public function update(Request $request, $alumni_id)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'streetAddress' => 'required',
            'barangay' => 'required',
            'city' => 'required',
            'district' => 'required',
            'province' => 'required',
            'region' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email',
            'batchNumber' => 'required',
            'training_status' => 'required',
            'scholarship' => 'required',
        ]);

        $alumniToUpdate = Alumni::findOrFail($alumni_id);

        // Check if updating would create a duplicate with another alumni
        $existingAlumni = Alumni::where([
            ['firstName', '=', $validated['firstName']],
            ['middleName', '=', $validated['middleName']],
            ['lastName', '=', $validated['lastName']],
        ])->first();

        if ($existingAlumni && $existingAlumni->id !== $alumniToUpdate->id) {
            Alert::error('Error', 'Updating would create a duplicate with another alumni!');
            return back()->withInput();
        }

        $alumniToUpdate->update($validated);

        Alert::info('Success', 'Alumni has been updated!');
        return redirect('/alumni');
    }

    public function edits($alumni_id)
    {
        $alumni = Alumni::findOrFail($alumni_id);

        return view('view', [
            'alumni' => $alumni,
        ]);
    }

    public function upgrade(Request $request, $alumni_id)
    {
        $request->validate([
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'streetAddress' => 'required|string',
            'barangay' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'region' => 'required|string',
            'birthdate' => 'required|date',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'nationality' => 'required|string',
            'civil_status' => 'required|string',
            'email' => 'required|email',
            'batchNumber' => 'required|integer',
            'training_status' => 'required|string',
            'scholarship' => 'required|string',
        ]);

        $alumni = Alumni::findOrFail($alumni_id);
        $alumni->update($request->all());

        Alert::success('Success', 'Profile updated successfully.');
        return redirect()->route('surveyform', ['alumni_id' => $alumni_id])->with('success', 'Profile updated successfully.');
    }

    public function mail()
    {
        return view('alumni.alumni-sendmail');
    }

//     public function import(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'file' => 'required|mimes:csv,txt|max:2048',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->back()
//                         ->withErrors($validator)
//                         ->withInput();
//         }

//         $file = $request->file('file');
//         $filePath = $file->getRealPath();

//         $csvData = array_map('str_getcsv', file($filePath));

//         foreach ($csvData as $key => $row) {
//             if ($key == 0) {
//                 continue;
//             }

//             $alumni = new Alumni();
//             $alumni->firstName = $row[0];
//             $alumni->middleName = $row[1];
//             $alumni->lastName = $row[2];
//             $alumni->streetAddress = $row[3];
//             $alumni->barangay = $row[4];
//             $alumni->city = $row[5];
//             $alumni->district = $row[6];
//             $alumni->province = $row[7];
//             $alumni->region = $row[8];
//             $alumni->birthdate = $row[9];
//             $alumni->age = $row[10];
//             $alumni->sex = $row[11];
//             $alumni->nationality = $row[12];
//             $alumni->civil_status = $row[13];
//             $alumni->email = $row[14];
//             $alumni->batchNumber = $row[15];
//             $alumni->training_status = $row[16];
//             $alumni->scholarship = $row[17];

//             $alumni->save();
//         }

//         return redirect()->back()->with('success', 'Alumni imported successfully.');
//     }
// }

}
