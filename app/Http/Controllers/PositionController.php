<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PositionController extends Controller
{

    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('positions.index')
            ->with('data',$data)
            ->with('plural',"positions")
            ->with('singular',"position")
            ->with('name',"name")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('positions.deleted')
            ->with('data',$data)
            ->with('plural',"positions")
            ->with('singular',"position")
            ->with('name',"name")
        ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('positions.show')
            ->with('data',$data)
            ->with('plural',"positions")
            ->with('singular',"position");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "positions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        $endpoint2 = "zones";
        $url2 = $base_url.$endpoint2;
        $zones = Http::withToken($token)->get($url2)->json();

        return view('positions.edit')
            ->with('data',$data)
            ->with('zones',$zones)
            ->with('plural',"positions")
            ->with('singular',"position")
            ->with('name',"name")
        ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
                'zone_id' => $request->zone_id,
            ]
        );

        return redirect()->route('positions.index');
    }

    public function create(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint2 = "zones";
        $url2 = $base_url.$endpoint2;
        $zones = Http::withToken($token)->get($url2)->json();

        return view('positions.create')
            ->with('zones',$zones)
            ->with('plural',"positions")
            ->with('singular',"position")
            ->with('name',"name")
        ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
                'zone_id' => $request->zone_id,
            ]
        );

        return redirect()->route('positions.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('positions.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('positions.deleted');
    }

    public function restore($id)
    {
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "positions/" . $id . "/restore";
        $url = $base_url . $endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('positions.deleted');
    }
}
