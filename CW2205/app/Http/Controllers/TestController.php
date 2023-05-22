<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index()
    {
        $arr = array("PHP", "C#", "C++", "JS");
        $languages = array("ua", "en", "pl");
        return view('Test.index', array('p' => $arr, 'l' => $languages));
    }
}
