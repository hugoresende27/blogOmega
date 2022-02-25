<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

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
}
