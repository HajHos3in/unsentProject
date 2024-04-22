<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $messages = Message::where("created_at","<=",now()->subMinutes(5))->orWhere([["created_at",">=",now()->subMinutes(5)],["ip",getIp()]])->orderBy("id","DESC")->paginate(9);

        if ($request->ajax()) {
            $view = "";
            foreach ($messages as $message){
                $view .= view('components.message-box',["id" => $message->id, "name" => $message->name, "backgroundColor" => $message->backgroundColor, "message" => $message->message])->render();
            }

            return response()->json(['html'=>$view]);
        }

        return view('index',["messages" => $messages]);
    }
}
