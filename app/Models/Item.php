<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'categorie_id',
        'type',
        'password',
        'extra'
    ];



    public static function tableItems()
    {
        return DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'items.categorie_id', '=', 'catagories.id')
            ->get();
    }


    public static function itemsCount()
    {
        return DB::table('items')->where('user_id', Auth::user()->id)->count();
    }


    public static function favoriteCount()
    {
        return DB::table('items')->where('user_id', Auth::user()->id)->where('is_favorite', 1)->count();
    }


    public static function getUserPassword(int $items_id)
    {
        return DB::table('items')->select('password')->where('user_id', Auth::user()->id)->where('id', $items_id)->first();
    }
}
