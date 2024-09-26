<?php

//for future = its a must to add controller if need complex data
namespace App\Http\Controllers; 

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); //assuming the view is named dashboard.blade.php
    }
}
