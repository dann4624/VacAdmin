<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ZoneLogController extends Controller
{

    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zoneLogs.index')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zoneLog")
            ->with('name',"id")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zoneLogs.deleted')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zoneLog")
            ->with('name',"id")
            ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('zoneLogs.show')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"zoneLog");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "zones";
        $url = $base_url.$endpoint;
        $zones = Http::withToken($token)->get($url)->json();

        $endpoint2 = "logActions/";
        $url2 = $base_url.$endpoint2;
        $actions = Http::withToken($token)->get($url2)->json();

        $endpoint3 = "zoneLogs/".$id;
        $url3 = $base_url.$endpoint3;
        $data = Http::withToken($token)->get($url3)->json();


        return view('zoneLogs.edit')
            ->with('data',$data)
            ->with('zones',$zones)
            ->with('logActions',$actions)
            ->with('plural',"zoneLogs")
            ->with('singular',"zoneLog")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs/".$id;
        $url = $base_url.$endpoint;

        if(isset($request->alarm)){
            $alarm = 1;
        }
        else{
            $alarm = 0;
        }

        $data = Http::withToken($token)->put($url,
            [
                'zone_id' => $request->zone_id,
                'log_action_id' => $request->log_action_id,
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'alarm' => $alarm,
            ]
        );

        return redirect()->route('zoneLogs.index');
    }

    public function create(){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "zones/";
        $url = $base_url.$endpoint;
        $zones = Http::withToken($token)->get($url)->json();

        $endpoint2 = "logActions/";
        $url2 = $base_url.$endpoint2;
        $actions = Http::withToken($token)->get($url2)->json();

        return view('zoneLogs.create')
            ->with('zones',$zones)
            ->with('logActions',$actions)
            ->with('plural',"zoneLogs")
            ->with('singular',"zoneLog")
        ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs";
        $url = $base_url.$endpoint;

        if(isset($request->alarm)){
            $alarm = 1;
        }
        else{
            $alarm = 0;
        }

        $data = Http::withToken($token)->post($url,
            [
                'zone_id' => $request->zone_id,
                'log_action_id' => $request->log_action_id,
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'alarm' => $alarm,
            ]
        );

        return redirect()->route('zoneLogs.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('zoneLogs.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('zoneLogs.deleted');
    }

    public function restore($id)
    {
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "zoneLogs/" . $id . "/restore";
        $url = $base_url . $endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('zoneLogs.deleted');
    }
}
