<?php

namespace App\Http\Controllers;

use App\Helper\Functions;
use App\Models\Catagorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class ItemsController extends BaseController
{
    /**
     * Displays all the items page
     */
    public function index()
    {
        $items = DB::table('items')
            ->select('items.*', 'catagories.title as catagorie')
            ->leftJoin('catagories', 'items.categorie_id', '=', 'catagories.id')
            ->get();

        // dd($items);


        return view('items.index', [
            'catagories' => $this->password_catagories,
            'items' => $items
        ]);
    }



    /**
     * Stores the new item in de database
     */
    public function store(Request $request, Catagorie $catagorie)
    {
        $user = Auth::user();
        $extra_array = Functions::generateExtraArray($request->all());

        // Validates the default request data
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', Password::defaults(), 'max:32'],
        ]);


        $this->extraValidate($extra_array, $request);

        
        dd($request);
    }



    private function extraValidate(array $extra_array, $request)
    {   
        $valid = [];

        foreach ($extra_array as $data => $value) {
            $valid[$data] = "required";
        }

        $request->validate($valid);
    }
}

