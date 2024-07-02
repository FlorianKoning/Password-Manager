<?php

namespace App\Http\Controllers;

use App\Models\Catagorie;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $items = Item::tableItems();

        $catagoie_count = Catagorie::categoriesCount();
        $items_count = Item::itemsCount();
        $favorite_count = Item::favoriteCount();

        return view('dashboard.dashboard', [
            'catagories' => $this->password_catagories,
            'items' => $items,
            'catagoie_count' => $catagoie_count,
            'items_count' => $items_count,
            'favorite_count' => $favorite_count
        ]);
    }
}
