<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
public function showHome(){

    //$myVar = "Hello World";

    //$userInfo = $this->getContactInfo();

    //dd($userInfo); //usado para debug (dump and die)
    return view('home');

}

private function getContactInfo(){
    $user = [
        'name' => 'Rui,',
        'email' => 'rui@email.com'
    ];
    return $user;
}
}
