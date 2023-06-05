<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'title' => 'Instagram',
        ]);
    }

    public function explore()
    {
        return view('explore', [
            'title' => 'Instagram',
        ]);
    }
}
