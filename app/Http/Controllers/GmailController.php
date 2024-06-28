<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailDemo;
use App\Models\Alumni;
use RealRashid\SweetAlert\Facades\Alert;

class GmailController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'emails' => 'nullable|string',
            'sendToAll' => 'nullable|boolean',
            'batchNumber' => 'nullable|string',
        ]);

        $data = [
            'body' => $request->body,
        ];

        $emails = [];

        // Check if 'sendToAll' is selected
        if ($request->has('sendToAll') && $request->sendToAll) {
            $emails = Alumni::pluck('email')->toArray();
        }
        // Check if specific email is provided
        elseif ($request->has('emails') && !empty($request->emails)) {
            $emails = explode(',', $request->emails);
        }
        // Check if batch number is selected
        elseif ($request->has('batchNumber') && !empty($request->batchNumber)) {
            $emails = Alumni::whereIn('batchNumber', explode(',', $request->batchNumber))->pluck('email')->toArray();
        }

        foreach ($emails as $email) {
            $email = trim($email);
            $alumnus = Alumni::where('email', $email)->first();
            if ($alumnus) {
                Mail::to($alumnus->email)->send(new GmailDemo($data));

                $alumnus->pending = true;
                $alumnus->save();
            }
        }

        Alert::info('Success', 'Emails sent successfully to the selected alumni and pending status updated!');
        return redirect('/alumni');
    }
}
