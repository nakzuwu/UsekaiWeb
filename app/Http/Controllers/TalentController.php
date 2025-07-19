<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TalentController extends Controller
{
    public function index()
    {
        return view('talent');
    }
}
