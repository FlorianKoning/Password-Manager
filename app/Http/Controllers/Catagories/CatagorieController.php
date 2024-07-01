<?php

namespace App\Http\Controllers\Catagories;

use App\Models\Catagorie;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class CatagorieController extends BaseController
{

    /**
     * Displays all items from given catagorie
     */
    public function index(Catagorie $catagorie): View
    {
        // Gets all the items from catagorie_id
        $items = DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'categorie_id', '=', 'catagories.id')
            ->where('categorie_id', $catagorie['id'])
            ->where('user_id', Auth::user()->id)
            ->get();
            

        return view('catagories.index', [
            'catagories'  => $this->password_catagories,
            'catagorie' => $catagorie,
            'items' => $items,
        ]);
    }
}
