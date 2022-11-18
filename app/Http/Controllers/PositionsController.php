<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function indexAction(){
        return '<pre>' . Position::all()->sortBy('id') . '</pre>';
    }
}
