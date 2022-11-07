<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function form(){
        return view('login');
    }

    public function login(Request $request){
        $base_url = config('api.url');
        $endpoint = "authenticate/panel";
        $url = $base_url.$endpoint;

        /*
        // For Debug Purposes
        echo "<b>Token : </b>".$token."<br>";
        echo "<b>Base URL : </b>".$base_url."<br>";
        echo "<b>Full URL : </b>".$url."<br>";
        echo "<br><br>";
        echo "<b>Username : </b>".$request->username."<br>";
        echo "<b>Password : </b>".$request->password."<br>";
        echo "<br><br>";
        */

        $data = Http::asForm()->post($url,
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        );

        //echo "First Reason : ".$user->reason()."<br>";
        if($data->failed()){
            return redirect()->route('login.form');
        }
        else{
            $data_object = json_decode($data, true);

            $user_data = $data_object[0];
            $token_data = $data_object[1];

            $permissions = [];

            foreach($user_data['role']['permissions'] as $permission){
                array_push($permissions,$permission['name']);
            }

            session([
                'user' => $user_data,
                'id' => $user_data['id'],
                'token' => $token_data['token'],
                'permissions' => $permissions,
            ]);

            return redirect()->route('home');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        Session::flush();
        return redirect()->route('login.form');
    }
}
