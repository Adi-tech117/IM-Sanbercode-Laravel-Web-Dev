<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register(){
        return view("Biodata");
    }

    public function welcome (Request $request){
        $firstname = $request -> input("firstname");
        $lastname = $request -> input("lastname");

        return view("home", ["firstname"=>$firstname, "lastname"=>$lastname]);
    }
    public function Biodata(){
        return view("home");
    }
}
