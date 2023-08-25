<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Declaration;

class HomeController extends Controller
{
    
    public function index() {
        $declarations = Declaration::orderBy('created_at', 'desc')->limit(4);
        return view('pages.home', [
            'declarations' => $declarations,
        ]);
    }

}
