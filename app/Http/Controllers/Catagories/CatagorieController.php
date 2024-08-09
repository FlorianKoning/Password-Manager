<?php

namespace App\Http\Controllers\Catagories;

use App\Models\User;
use App\Models\Catagorie;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Routing\RedirectController;
use App\Http\Requests\StoreCatagorieRequest;

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
            ->paginate(7);
            

        return view('catagories.index', [
            'catagories'  => $this->password_catagories,
            'profile_picture' => $this->profile_picture,
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
