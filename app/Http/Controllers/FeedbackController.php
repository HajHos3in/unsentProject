<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Rules\badwords;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function feedback(): View
    {
        return view('feedback');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "fullname" => ["required","min:2","max:64","string",new badwords],
            "email" => ["required","min:3","max:128","string","email"],
            "text" => ["required","min:3","max:1024","string",new badwords]
        ]);

        feedback::create([
            "fullname" => $request->fullname,
            "email" => $request->email,
            "text" => $request->text,
            "ip" => $request->ip()
        ]);

        return redirect()->route("feedback")->with("msg", "Thanks. Your message has been saved successfully.");
    }
}
