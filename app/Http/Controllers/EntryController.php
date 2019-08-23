<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index()
    {
        return view('entry.index', [
            'entries' => Entry::paginate(25)
        ]);
    }
}
