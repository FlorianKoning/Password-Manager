<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invitation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'token',
        'expires_at',
        'used',
        'invited_by',
    ];

    /**
     * Gnerates a random token with a length of 40 characters.
     * 
     * @return string
     */
    public static function generateToken(): string
    {
        return Str::random(40);
    }
}
