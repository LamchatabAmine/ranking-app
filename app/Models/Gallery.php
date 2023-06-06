<?php

namespace App\Models;

use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;


    protected $fillable = [
        'business_id',
        'path',
        'type',
        'created_at',
        'updated_at',
    ];


    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
