<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        $request->validate([
            "message_id" => [
                "required",
                "integer",
                "exists:messages,id",
                Rule::unique('reports')->where(function ($query) use ($request) {
                    return $query->where('ip', getIp())->where('message_id', $request->message_id);
                })
            ]
        ]);

        report::create([
            "message_id" => $request->message_id,
            "ip" => getIp()
        ]);

        $countOfReportsThisMessage = report::where("message_id",$request->message_id)->count();
        if($countOfReportsThisMessage >= 3){
            Message::where("id",$request->message_id)->update(["visibility" => 0]);
        }

        return response()->json("success");
    }
}
