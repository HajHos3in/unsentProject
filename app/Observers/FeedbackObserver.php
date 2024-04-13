<?php

namespace App\Observers;

use App\Models\feedback;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class FeedbackObserver
{
    /**
     * Handle the Message "created" event.
     */
    public function creating(feedback $feedback): void
    {
        $feedback->text = mb_substr($feedback->text,0,1024);

        if(feedback::where("ip",$feedback->ip)->where('created_at',">",Carbon::now()->subHours(12))->count() != 0){
            throw ValidationException::withMessages(['time' => 'You can only send one message per 12 hours.']);
        }
    }
}
