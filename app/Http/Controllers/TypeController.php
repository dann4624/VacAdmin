<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TypeController extends Controller
{
    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('types.index')
            ->with('data',$data)
            ->with('plural',"types")
            ->with('singular',"type")
            ->with('name',"name")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('types.deleted')
            ->with('data',$data)
            ->with('plural',"types")
            ->with('singular',"type")
            ->with('name',"name")
        ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('types.show')
            ->with('data',$data)
            ->with('name',"name")
            ->with('plural',"types")
            ->with('singular',"type");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('types.edit')
            ->with('data',$data)
            ->with('plural',"types")
            ->with('singular',"type")
            ->with('name',"name")
        ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('types.index');
    }

    public function create(){
        return view('types.create')
            ->with('plural',"types")
            ->with('singular',"type")
        ;;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('types.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('types.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('types.deleted');
    }

    public function restore($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "types/".$id."/restore";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('types.deleted');
    }
}
