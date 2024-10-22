<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LuckyHistory;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SpecialPageController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->link_expires_at < now()) {
            abort(403, 'This link has expired.');
        }

        return view('special_page', ['user' => $user]);
    }

    public function generateLink($id)
    {
        $user = User::findOrFail($id);
        $user->unique_link = Str::uuid();
        $user->link_expires_at = Carbon::now()->addDays(7);
        $user->save();

        return back()->with('message', 'New link generated!');
    }

    public function deactivateLink($id)
    {
        $user = User::findOrFail($id);
        $user->unique_link = null;
        $user->link_expires_at = null;
        $user->save();

        return back()->with('message', 'Link deactivated.');
    }

    public function feelingLucky($id)
    {
        $user = User::findOrFail($id);
        $randomNumber = rand(1, 1000);
        $result = ($randomNumber % 2 === 0) ? 'Win' : 'Lose';
        $winAmount = 0;

        if ($randomNumber > 900) {
            $winAmount = $randomNumber * 0.7;
        } elseif ($randomNumber > 600) {
            $winAmount = $randomNumber * 0.5;
        } elseif ($randomNumber > 300) {
            $winAmount = $randomNumber * 0.3;
        } else {
            $winAmount = $randomNumber * 0.1;
        }

        // Сохраним результат
        LuckyHistory::create([
            'user_id' => $user->id,
            'random_number' => $randomNumber,
            'result' => $result,
            'win_amount' => $winAmount,
        ]);

        return back()->with('message', "Your number: $randomNumber, Result: $result, Win Amount: $winAmount");
    }

    public function history($id)
    {
        $user = User::findOrFail($id);
        $history = LuckyHistory::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('history', ['history' => $history]);
    }
}
