<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [
            'entry_amount' => Entry::count(),
        ]);
    }
}
