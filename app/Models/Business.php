<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'category_id',
        'title',
        'logo',
        'description',
        'website',
        'address',
        'created_at',
        'updated_at',
    ];





    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cities(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
