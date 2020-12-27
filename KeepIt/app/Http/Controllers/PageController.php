<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class PageController extends Controller
{
    // For Add Project
    public function addproject()
    {
      if (Session('level') == 'user') {
        return view('front');
      }else {
        return view('login', ['massage' => 'Login Dahulu....']);
      }
    }

    // For view Data
    public function data()
    {
      $file = Data::all();
      if (Session('level') == 'user') {
        return view('formdata',compact('file'));
      }else {
        return view('login', ['massage' => 'Login Dahulu....']);
      }
    }
}
