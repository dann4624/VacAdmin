<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ZoneController extends Controller
{

    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zones.index')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zone")
            ->with('name',"name")
            ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zones.deleted')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zone")
            ->with('name',"name")
            ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zones.show')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zone");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zones.edit')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zone")
            ->with('name',"name")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
            ]
        );

        return redirect()->route('zones.index');
    }

    public function create(){
        return view('zones.create')
            ->with('plural',"zones")
            ->with('singular',"zone")
        ;;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
            ]
        );

        return redirect()->route('zones.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('zones.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('zones.deleted');
    }

    public function restore($id)
    {
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zones/" . $id . "/restore";
        $url = $base_url . $endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('zones.deleted');
    }

    public function types_form($id){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "zones/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();
        $zone_has_types = $data['types'];

        $zone_types = [];
        foreach($zone_has_types as $permission){
            array_push($zone_types,$permission['name']);
        }


        $endpoint2 = "types/";
        $url2 = $base_url.$endpoint2;
        $data2 = Http::withToken($token)->get($url2)->json();


        return view('zones.types')
            ->with('data',$data)
            ->with('zone_types',$zone_types)
            ->with('types_list',$data2)
            ->with('plural',"roles")
            ->with('singular',"types")
        ;
    }

    public function types_submit($id, Request $request){
        $types = [];

        $token = Session::get('token');
        $base_url = config('api.url');

        // Types related
        $endpoint = "types/";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        foreach($data as $type){
            $name = $type['name'];
            if($request->$name != Null){
                array_push($types,$type['id']);
            }
        }

        // Update Related
        $endpoint = "zones/".$id."/types";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'types' => $types,
            ]
        );

        return redirect()->route('zones.types.form',['id' => $id]);

    }
}
