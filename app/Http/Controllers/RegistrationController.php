<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;


class RegistrationController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->username,
            'phone' => $request->phonenumber,
            'unique_link' => Str::uuid(),
            'link_expires_at' => Carbon::now()->addDays(7), // Линк действителен 7 дней
        ]);

// Генерируем уникальный линк
        $link = URL::temporarySignedRoute('special.page', now()->addDays(7), ['id' => $user->id]);

        return view('register_success', ['link' => $link]);
    }
}
