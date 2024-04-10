<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
            "name" => "required|string|min:3|max:64",
            "message" => "required|min:3|max:128|string",
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
