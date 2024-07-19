<?php

namespace App\Http\Controllers\DeliveryAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryAgentController extends Controller
{
    //

    public function index()
    {
        return view('DeliveryAgent.index');
    }
}
