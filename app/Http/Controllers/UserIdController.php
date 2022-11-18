<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserIdController extends Controller
{
    public function indexAction($id){
        $this->data['users'] = User::where('id', 'like', $id)->get();
        return view('userId', ['data' => $this->data]);
    }
}
