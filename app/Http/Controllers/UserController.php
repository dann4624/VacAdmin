<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        return view('users.index')
            ->with('data',$data)
            ->with('plural',"users")
            ->with('singular',"user")
            ->with('name',"id")
        ;
    }

    public function deleted(){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        return view('users.deleted')
            ->with('data',$data)
            ->with('plural',"users")
            ->with('singular',"user")
            ->with('name',"id")
            ;
    }


    public function show($id){

        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        return view('users.show')
            ->with('data',$data)
            ->with('plural',"users")
            ->with('singular',"user")
            ->with('name',"name")
            ;
    }

    public function edit($id){
        $user = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "users/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        $endpoint2 = "targets/";
        $url2 = $base_url.$endpoint2;
        $targets = Http::withToken($user)->get($url2)->json();

        $endpoint3 = "roles/";
        $url3 = $base_url.$endpoint3;
        $roles = Http::withToken($user)->get($url3)->json();

        return view('users.edit')
            ->with('data',$data)
            ->with('plural',"users")
            ->with('singular',"user")
            ->with('targets',$targets)
            ->with('roles',$roles)
            ;
    }

    public function update($id,Request $request){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->put($url,
            [
                'email' => $request->email,
                'password' => hash("sha512",$request->target_id),
                'name' => $request->name,
                'role_id' => $request->role_id,
            ]
        );

        return redirect()->route('users.index');
    }

    public function create(){
        $user = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "targets/";
        $url = $base_url.$endpoint;
        $targets = Http::withToken($user)->get($url)->json();

        $endpoint2 = "roles/";
        $url2 = $base_url.$endpoint2;
        $roles = Http::withToken($user)->get($url2)->json();

        return view('users.create')
            ->with('plural',"users")
            ->with('singular',"user")
            ->with('targets',$targets)
            ->with('roles',$roles)
            ;
    }

    public function store(Request $request){
        echo $request->role_id."<br>";
        echo $request->target_id;


        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->post($url,
            [
                'email' => $request->email,
                'password' => hash("sha512",$request->target_id),
                'name' => $request->name,
                'role_id' => $request->role_id,
            ]
        );

        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->delete($url);

        return redirect()->route('users.index');
    }

    public function delete_force($id){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->delete($url);

        return redirect()->route('users.deleted');
    }

    public function restore($id){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "users/".$id."/restore";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->put($url);

        return redirect()->route('users.deleted');
    }
}
