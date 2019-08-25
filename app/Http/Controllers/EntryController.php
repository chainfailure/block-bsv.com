<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Violation;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index()
    {
        return view('entry.index', [
            'entries' => Entry::paginate(25)
        ]);
    }

    public function violation(Violation $violation)
    {
        return response()
            ->file(storage_path("app/violations/{$violation->screenshot}.png"));
    }
}
