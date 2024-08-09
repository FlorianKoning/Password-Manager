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
        'extra',
        'is_favorite'
    ];



    public static function tableItems()
    {
        return DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'items.categorie_id', '=', 'catagories.id')
            ->paginate(7);
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


    public static function getOldItems()
    {
        return count(DB::table('items')
        ->select('*')
        ->where('updated_at', '<=', now()->subYear())
        ->where('items.user_id', Auth::user()->id)
        ->get());
    }


    /**
     * Gets all the favorite items of the user
     */
    public static function getAllFavorite()
    {
        return DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'items.categorie_id', '=', 'catagories.id')
            ->where('items.user_id', Auth::user()->id)
            ->where('items.is_favorite', 1)
            ->paginate(7);
    }



    /**
     * Gets all the not secure items from the user
     */
    public static function getNotSecureItems()
    {
        return DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'items.categorie_id', '=', 'catagories.id')
            ->where('updated_at', '<=', now()->subYear())
            ->where('items.user_id', Auth::user()->id)
            ->get();
    }



    public static function searchQuery(string $search)
    {
        return DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'items.categorie_id', '=', 'catagories.id')
            ->where('items.title', 'LIKE', "%$search%")
            ->where('items.user_id', Auth::user()->id)
            ->paginate(7);
    }
}
