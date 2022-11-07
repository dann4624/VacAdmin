<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LogActionController extends Controller
{
    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('logActions.index')
            ->with('data',$data)
            ->with('plural',"logActions")
            ->with('singular',"logAction")
            ->with('name',"name")
            ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('logActions.deleted')
            ->with('data',$data)
            ->with('plural',"logActions")
            ->with('singular',"logAction")
            ->with('name',"name")
            ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('logActions.show')
            ->with('data',$data)
            ->with('plural',"logActions")
            ->with('singular',"logAction");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('logActions.edit')
            ->with('data',$data)
            ->with('plural',"logActions")
            ->with('singular',"logAction")
            ->with('name',"name")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('logActions.index');
    }

    public function create(){
        return view('logActions.create')
            ->with('plural',"logActions")
            ->with('singular',"logAction")
            ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('logActions.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('logActions.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('logActions.deleted');
    }

    public function restore($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "logActions/".$id."/restore";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('logActions.deleted');
    }

}
