<?php

namespace App\Observers;

use App\Models\Message;
use Carbon\Carbon;

class MessageObserver
{

    /**
     * Handle the Message "created" event.
     */
    public function creating(Message $message): void
    {
        $message->message = mb_substr($message->message,0,128);

        if(Message::where("ip",$message->ip)->where('created_at',">",Carbon::now()->subHours(1))->count() != 0){
            throw new \Exception('You can only send one message per hour.');
        }
    }

    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "updated" event.
     */
    public function updated(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     */
    public function deleted(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     */
    public function restored(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     */
    public function forceDeleted(Message $message): void
    {
        //
    }
}
