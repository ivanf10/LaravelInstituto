<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function index(){
        $numero = rand(1,100);
        $date = date("Y-m-d");
        return view('saludo',["numero"=>$numero, "date"=>$date]);
    }
}
