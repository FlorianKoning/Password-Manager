<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Helper\Functions;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{



    public function index()
    {
        $items = Item::tableItems();

        return view('dashboard.dashboard', [
            'catagories' => $this->password_catagories,
            'profile_picture' => $this->profile_picture,
            'items' => $items,
            'catagoie_count' => Category::categoriesCount(),
            'items_count' => Item::itemsCount(),
            'favorite_count' => Item::favoriteCount(),
            'item_safety' => Functions::itemSafety(),
        ]);
    }



}
