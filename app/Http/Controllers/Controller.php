<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Menu;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $menuOptions = [];

    public function __construct()
    {
        Menu::make('MyNavBar', function ($menu)  {

            foreach (Controller::$menuOptions as $k => $v)
                $menu->add($k,$v);
        });
    }

    protected function getUser()
    {
        return Auth::user();
    }
}
