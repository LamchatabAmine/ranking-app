<?php

namespace App\Models;

use App\Models\User;
use App\Models\Business;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saved extends Model
{
    use HasFactory;
    protected $table = 'saved';


    protected $fillable = [
        'user_id',
        'business_id',
        'created_at',
        'updated_at',
    ];



    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Business model
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
