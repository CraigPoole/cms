<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        self::$menuOptions = ['Home'=> '','About'=>'about','Services'=>'services','Contact'=>'contact'];
        parent::__construct();
    }

    public function index()
    {
        $user = $this->getUser();
        return view('profile/index',['user' => $user]);
    }
}
