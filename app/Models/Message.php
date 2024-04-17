<?php

namespace App\Models;

use App\Models\Scopes\visibilityScope;
use App\Observers\MessageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([MessageObserver::class])]
#[ScopedBy([visibilityScope::class])]
class Message extends Model
{
    use HasFactory;

    protected $fillable = ["name","message","backgroundColor","ip"];
}
