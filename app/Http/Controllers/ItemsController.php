<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Helper\Functions;
use App\Models\Catagorie;
use Illuminate\Http\Request;
use App\Helper\AuthenticationKey;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class ItemsController extends BaseController
{
    private $validation_map = [
        'edit' => [
            'edit_title' => 'required|string|max:100',
            'edit_password' => 'required|string|max:50',
        ],
        'normal' => [
            'title' => 'required|string|max:100',
            'password' => 'required|string|max:50',
        ]
    ];


    /**
     * Stores the new item in de database
     */
    public function store(Request $request, Catagorie $catagorie)
    {
        $user = Auth::user();
        $extra_array = Functions::generateExtraArray($request->all());


        // Validates the request data
        $this->validation($extra_array, $request, 'store');


        // Encrypt all the extra request data in a json file
        $json_file = $this->encryptJsonFile($extra_array);

        // Creates the new item in the database
        Item::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'categorie_id' => $request->catagorie_id,
            'type' => $request->type,
            'password' => Crypt::encrypt($request->password),
            'extra' => json_encode($json_file)
        ]);

        
        // Returns the user with succes message
        return redirect()->route('catagorie.index', $request->catagorie_id)->with('succesMessage', 'true');
    }



    public function update(Request $request)
    {
        // Validates the request data
        $extra_array = Functions::generateExtraArray($request->all());
        $this->validation($extra_array, $request, 'edit');

        // Encrypt all the extra request data in a json file
        $json_file = $this->encryptJsonFile($extra_array);


        // updates all the data
        DB::table('items')
            ->where('id','=', $request->item_id)
            ->update([
                'title' => $request->edit_title,
                'type' => $request->edit_type,
                'password' => Crypt::encrypt($request->edit_password),
                'extra' => json_encode($json_file)
            ]);



        // Returns user to catagorie page
        if(isset($request->catagorie_id)){
            return redirect()->route('catagorie.index', $request->catagorie_id)->with('succesMessage', 'true');
        }

        // Returns users to the dashboard
        return redirect()->route('dashboard.index')->with('succesMessage', 'true');
    }



    /**
     * ncrypt all the extra request data in a json file
     */
    private function encryptJsonFile(array $extra_array)
    {
        foreach ($extra_array as $key => $value) {
            $extra_array[$key] =  Crypt::encryptString($value);
        }

        return $extra_array;
    }


    /**
     * Validates all the request data
     */
    private function validation($extra_array, $request, $option)
    {   
        // Validates the default request data
        if(array_key_exists($option, $this->validation_map)) {
            $request->validate($this->validation_map[$option]);
        }
        
        // Extra request data validation
        foreach ($extra_array as $key => $value) {
            $extra_array[$key] = "required";
        }
        
        $request->validate($extra_array);
    }
}

