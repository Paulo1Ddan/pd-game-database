<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    
    public function index():object
    {
        return view('welcome');
    }

    public function testPost(Request $request)
    {
        dd($request->all());
    }
}
