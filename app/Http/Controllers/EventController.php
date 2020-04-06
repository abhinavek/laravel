<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getevents()
    {
        return view('broadcast.event');
    }
    public function postevents()
    {

    }
}
