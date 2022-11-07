<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TokenController extends Controller
{
    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();


        return view('tokens.index')
            ->with('data',$data)
            ->with('plural',"tokens")
            ->with('singular',"token")
            ->with('name',"id")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();


        return view('tokens.deleted')
            ->with('data',$data)
            ->with('plural',"tokens")
            ->with('singular',"token")
            ->with('name',"id")
        ;
    }


    public function show($id){

        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('tokens.show')
            ->with('data',$data)
            ->with('plural',"tokens")
            ->with('singular',"token")
            ->with('name',"id")
        ;
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "tokens/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        $endpoint2 = "targets/";
        $url2 = $base_url.$endpoint2;
        $targets = Http::withToken($token)->get($url2)->json();

        $endpoint3 = "roles/";
        $url3 = $base_url.$endpoint3;
        $roles = Http::withToken($token)->get($url3)->json();

        return view('tokens.edit')
            ->with('data',$data)
            ->with('plural',"tokens")
            ->with('singular',"token")
            ->with('targets',$targets)
            ->with('roles',$roles)
        ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'role_id' => $request->role_id,
                'target_id' => $request->target_id,
            ]
        );

        return redirect()->route('tokens.index');
    }

    public function create(){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "targets/";
        $url = $base_url.$endpoint;
        $targets = Http::withToken($token)->get($url)->json();

        $endpoint2 = "roles/";
        $url2 = $base_url.$endpoint2;
        $roles = Http::withToken($token)->get($url2)->json();

        return view('tokens.create')
            ->with('plural',"tokens")
            ->with('singular',"token")
            ->with('targets',$targets)
            ->with('roles',$roles)
        ;
    }

    public function store(Request $request){
        echo $request->role_id."<br>";
        echo $request->target_id;


        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'role_id' => $request->role_id,
                'target_id' => $request->target_id,
            ]
        );

        return redirect()->route('tokens.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('tokens.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('tokens.deleted');
    }

    public function restore($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "tokens/".$id."/restore";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('tokens.deleted');
    }
}
