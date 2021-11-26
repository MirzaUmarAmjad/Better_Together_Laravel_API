<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class loginAuthController extends Controller
{

    // Store a newly created resource in storage.   
  // @param  \Illuminate\Http\Request  $request

  // @return \Illuminate\Http\Response

  public function store(Request $request) {
      //storing new values in the database

        $result = "not authenticated" ;
       $user = User::where('email', $request->input('email'))->first();
       if ($user != null) {
           if ($user->password == $request->input('password')) {
           $result = "authenticated" ;
            }
       }
       

       return $result;

 
  }

}
