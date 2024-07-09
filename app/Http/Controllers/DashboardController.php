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
        $item_safety = $this->itemSafety();


        return view('dashboard.dashboard', [
            'catagories' => $this->password_catagories,
            'items' => $items,
            'catagoie_count' => $catagoie_count,
            'items_count' => $items_count,
            'favorite_count' => $favorite_count,
            'item_safety' => $item_safety
        ]);
    }


    /**
     * Return the percentage of password that have not been updated for/since one year 
     */
    private function itemSafety()
    {
        $total_items = Item::itemsCount();
        $old_items = Item::getOldItems();

        if ($total_items == 0) return 0;

        return ($old_items / $total_items) * 100;
    }
}
