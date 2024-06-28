<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function showChangeAccountForm()
    {
        $user = Auth::user();
        return view('auth.changeAccount', compact('user'));
    }

    public function edit($id_user)
    {
        $user = User::where('id_user', $id_user)->firstOrFail();
        return view('auth.changeAccount', compact('user'));
    }

    public function update(Request $request, $id_user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id_user . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::where('id_user', $id_user)->firstOrFail();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        Alert::success('Success', 'User updated successfully.');
        return redirect()->route('user.edit', $user->id_user)->with('success', 'User updated successfully.');
    }
}
