<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Rules\badwords;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function submit(): View
    {
        return view("submit");
    }

    public function redirectToSubmit(): RedirectResponse
    {
        return redirect()->route("SubmitPage");
    }

    public function store(Request $request): View
    {
        $request->validate([
            "name" => ["required","min:2","max:64","string",new badwords],
            "message" => ["required","min:3","max:128","string",new badwords],
            "backgroundColor" => "required|hex_color"
        ]);

        $message = Message::create([
            "name" => $request->name,
            "message" => $request->message,
            "backgroundColor" => $request->backgroundColor,
            "ip" => $request->ip()
        ]);

        return view("posted", ["message" => $message]);
    }

    public function search(Request $request): View
    {
        $request->validate([
            "q" => "required|string|max:128"
        ]);

        $messages = Message::where("id",$request->q)->orWhere("name","like","%". $request->q ."%")->orWhere("message","like","%". $request->q ."%")->limit(50)->get();

        return view("search",[ "messages" => $messages ]);
    }
}
