<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use File;


class AdminController extends Controller
{
    //

    function viewMailTemplate(){
        return view ('welcome_email');
    }

    function viewAllusers(){

        $all_users = User::all();
        return view ('admin.all', compact ('all_users'));
    }

    function teste()
    {
        // $json = File::get("../database/data/country.json");
        $json = File::get("../database/data/country.json");
        $countries = json_decode($json);
        // dd(get_defined_vars());
        // dd($countries);
        foreach ($countries as $key => $value) {
            foreach ($value as $i){
                dd($i);
            }
           
            
        }
        
    }
}
