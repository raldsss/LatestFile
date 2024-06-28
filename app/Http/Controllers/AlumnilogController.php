<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;

class AlumnilogController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.alumnilog');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $alumni = Alumni::where('email', $request->email)->first();

        if ($alumni) {

            if ($alumni->pending) {
                $alumni->pending = false;
                $alumni->save();
            }
            Auth::guard('alumni')->loginUsingId($alumni->alumni_id);
            return redirect()->route('surveyform')->with('success', 'Login Successful.');
        }

        return redirect()->route('alumnilog')->withInput($request->only('email'))->withErrors([
            'email' => 'Invalid email. Please try again.',
        ]);
    }

    public function showSurveyForm()
    {
        $alumni = Auth::guard('alumni')->user();

        if (!$alumni) {
            return redirect()->route('alumnilog')->withErrors('Please log in first.');
        }

        return view('surveyform', compact('alumni'));
    }
}
