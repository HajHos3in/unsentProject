<?php

namespace App\Models;

use App\Observers\FeedbackObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([FeedbackObserver::class])]
class feedback extends Model
{
    use HasFactory;

    protected $fillable = ["fullname","email","text","ip"];
}
