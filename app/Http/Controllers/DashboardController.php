<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Models\Catagorie;
use App\Models\Item;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    


    public function index()
    {
        $items = Item::tableItems();

        $catagoie_count = Catagorie::categoriesCount();
        $items_count = Item::itemsCount();
        $favorite_count = Item::favoriteCount();
        $item_safety = Functions::itemSafety();


        return view('dashboard.dashboard', [
            'catagories' => $this->password_catagories,
            'items' => $items,
            'catagoie_count' => $catagoie_count,
            'items_count' => $items_count,
            'favorite_count' => $favorite_count,
            'item_safety' => $item_safety
        ]);
    }

    
   
}
