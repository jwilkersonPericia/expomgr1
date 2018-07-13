<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['except' => ['welcome']]);
  }
    public function welcome(){
        return view('pages.welcome');
    }
    
    public function welcomebeta(){
        return view('pages.welcomebeta');
    }

    public function dashboard(){
        return view('pages.dashboard');
    }

    public function orders(){
        return view('pages.orders');
    }

    public function addorder(){
        return view('pages.addorder');
    }
}
