<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display Statuses's data.
     *
     * @return \App\Status
     */
    public function index()
    {        
        return response()->json(Status::get());
    }
}
