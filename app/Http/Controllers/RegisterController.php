<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    
    public function register(){
        
        return view('register');
    }

    public function process(Request $req){
        $ret = [
            'nama'  => $req->input('nama'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone')
        ];

        return view('forDisplay', $ret);
    }
}
