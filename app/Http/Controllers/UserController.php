<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tinify\Tinify;

class UserController extends Controller
{
    public function indexAction(Request $request){
        if (isset($_GET['count']) && is_numeric($_GET['count'])){
            $paginateAmount = $_GET['count'];
        }else{
            $paginateAmount = 6;
        }
        $_GET['page'] = 1;
        $this->data['users'] = User::orderBy('updated_at', 'asc')->paginate($paginateAmount);
        return view('user', ['data' => $this->data]);
    }


    public function newUserAction(Request $request){
        \Tinify\setKey('XD7FWjThrchbPl7htyWmKtPnNkp9s9WP');
        $data = $request->all();
        $validatedData = $request->validate(
            [
                'name' => [
                    'required',
                    'max:60',
                    'min:2',
                ],
                'email' => [
                    'required',
                    'email:rfc,dns',
                    'unique:users,email'
                ],
                'phone' => [
                    'required',
                    'regex:/^[\+]{0,1}380([0-9]{9})$/',
                    'unique:users,phone'
                ],
                'position_id' => [
                    'required',
                    'exists:positions,id'
                ],
                'photo' => [
                    'required',
                    'dimensions:min_width=70,min_height=70',
                    'max:5000',
                    'mimes:jpeg,jpg'
                ],

            ]
        );
        session()->regenerate();
        if(isset($validatedData['errors'])){
            return $validatedData;
        }else{
            $raw = \Tinify\fromFile($request->file('photo'));
            $compressed = $raw->resize([
                'method' => 'thumb',
                'width' => 70,
                'height' => 70
            ]);
            $photoPath = 'storage/userPhotos/' . Str::random(16) . '.jpg';
            $compressed->toFile($photoPath);
            $validatedData['photo'] = '/' . $photoPath;
            $validatedData['position'] = Position::where('id', 'like', $validatedData['position_id'])->get()[0]['name'];
            DB::table('users')->insert($validatedData);
            return 'Success!';
        }
    }
}
