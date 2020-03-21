<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function login()
    {
        return view('admin/views/login');
    }

    public function home()
    {
        return view('admin/views/home');
    }
}
