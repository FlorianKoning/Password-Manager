<?php

namespace App\Http\Controllers\Catagories;

use App\Http\Requests\StoreCatagorieRequest;
use App\Models\Catagorie;
use Illuminate\Routing\RedirectController;
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
            ->where('catagories.user_id', Auth::user()->id)
            ->get();
            

        return view('catagories.index', [
            'catagories'  => $this->password_catagories,
            'catagorie' => $catagorie,
            'items' => $items,
        ]);
    }


    // Stores the new catagorie
    public function store(StoreCatagorieRequest $reqeust)
    {
        $validated = $reqeust->validated();

        Catagorie::create([
            'title' => $validated['title'],
            'user_id' => Auth::user()->id
        ]);


        return redirect()->back()->with('newCatagorie', 'true');
    }
}
