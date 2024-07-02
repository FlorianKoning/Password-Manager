<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catagorie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id'
    ];

    /**
     * Tells laravel there are no timestamps columns
     */
    public $timestamps = false;



    public static function categoriesCount()
    {
        return DB::table('catagories')->where('user_id', Auth::user()->id)->count();
    }
}
