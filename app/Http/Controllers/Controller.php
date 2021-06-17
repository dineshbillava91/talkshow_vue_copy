<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->middleware('auth',['except' => ['login','register']]);
        if (Auth::check() && Auth::user()->role_id == '1') {
            $this->middleware('admin',['except' => ['participants']]);
        } else if (Auth::check() && Auth::user()->role_id == '2') {
            $this->middleware('participant',['except' => ['event','rating','tag','talks']]);
        }
    }
}
