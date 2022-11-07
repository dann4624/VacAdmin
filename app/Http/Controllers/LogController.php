<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LogController extends Controller
{
    public function index(){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        return view('logs.index')
            ->with('data',$data)
            ->with('plural',"logs")
            ->with('singular',"log")
            ->with('name',"id")
        ;
    }

    public function deleted(){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        return view('logs.deleted')
            ->with('data',$data)
            ->with('plural',"logs")
            ->with('singular',"log")
            ->with('name',"id")
            ;
    }


    public function show($id){

        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        return view('logs.show')
            ->with('data',$data)
            ->with('plural',"logs")
            ->with('singular',"log")
            ->with('name',"id")
            ;
    }

    public function edit($id){
        $user = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "logs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        $endpoint2 = "logActions";
        $url2 = $base_url.$endpoint2;
        $actions = Http::withToken($user)->get($url2)->json();

        $endpoint3 = "users";
        $url3 = $base_url.$endpoint3;
        $users = Http::withToken($user)->get($url3)->json();


        return view('logs.edit')
            ->with('data',$data)
            ->with('logActions',$actions)
            ->with('users',$users)
            ->with('plural',"logs")
            ->with('singular',"log")
            ;
    }

    public function update($id,Request $request){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->put($url,
            [
                'log_action_id' => $request->log_action_id,
                'user_id' =>$request->user_id,
                'data' => $request->data,
            ]
        );

        return redirect()->route('logs.index');
    }

    public function create(){
        $user = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "logs";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->get($url)->json();

        $endpoint2 = "logActions";
        $url2 = $base_url.$endpoint2;
        $actions = Http::withToken($user)->get($url2)->json();

        $endpoint3 = "users";
        $url3 = $base_url.$endpoint3;
        $users = Http::withToken($user)->get($url3)->json();


        return view('logs.create')
            ->with('data',$data)
            ->with('logActions',$actions)
            ->with('users',$users)
            ->with('plural',"logs")
            ->with('singular',"log")
        ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'log_action_id' => $request->log_action_id,
                'user_id' => $request->user_id,
                'data' => $request->data,
            ]
        );

        return redirect()->route('logs.index');
    }

    public function destroy($id){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->delete($url);

        return redirect()->route('logs.index');
    }

    public function delete_force($id){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->delete($url);

        return redirect()->route('logs.deleted');
    }

    public function restore($id){
        $user = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logs/".$id."/restore";
        $url = $base_url.$endpoint;
        $data = Http::withToken($user)->put($url);

        return redirect()->route('logs.deleted');
    }
}
