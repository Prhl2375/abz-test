<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function indexAction(Request $request){
        if (isset($_GET['count']) && is_numeric($_GET['count'])){
            $paginateAmount = $_GET['count'];
        }else{
            $paginateAmount = 6;
        }
        $_GET['page'] = 1;
        $this->data['users'] = User::latest()->paginate($paginateAmount);
        return view('Main.index', ['data' => $this->data]);
    }
}
