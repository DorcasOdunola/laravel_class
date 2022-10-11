<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index () {
        $name = "Dorcas";
        $age = 12;

        $users = [
            "name" => "Dorcas",
            "department" => "SE"
        ];
        return view ('home', [
            'users' => $users
        ]);

        // using compact method
        // return view ("home", compact('name', 'age'));

        // with method
        // $resp = [];
        // $resp['name'] = $name;
        // $resp['age'] = $age;
        // // return view ("home")->with('name', $name);
        // return view ("home")->with('details',$resp);

        // the direct method
        // return view ('home', [
        //     'name' => $name,
        //     'age' => $age
        // ]);
    }

    public function show ($title) {
        $users = [
            "name" => "Dorcas",
            "department" => "SE"
        ];
        return ($users[$title] ?? "Title " .$title . " not found");
    }
    //
    
}
