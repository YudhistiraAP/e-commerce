<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required','email','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $emailChanged = $validated['email'] !== $user->email;

        // update data dasar
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($emailChanged) {
            // reset verifikasi jika email diubah
            $user->email_verified_at = null;
        }

        $user->save();

        $action = $request->input('action', 'save');

        if ($action === 'verify') {
            // jika sudah terverifikasi (email sama & telah verified)
            if ($user->hasVerifiedEmail()) {
                return back()->with('status', 'Email sudah terverifikasi.');
            }
            // kirim email verifikasi ke email terbaru
            $user->sendEmailVerificationNotification();

            return back()->with('status', 'Link verifikasi telah dikirim ke ' . $user->email);
        }

        // action = save
        if ($emailChanged) {
            return back()->with('status', 'Profil disimpan. Email diubah — silakan klik Verifikasi untuk mengirim link verifikasi.');
        }

        return back()->with('status', 'Profil disimpan.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}
