<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class BoxLogController extends Controller
{

    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('boxLogs.index')
            ->with('data',$data)
            ->with('plural',"boxLogs")
            ->with('singular',"boxLog")
            ->with('name',"id")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('boxLogs.deleted')
            ->with('data',$data)
            ->with('plural',"zones")
            ->with('singular',"boxLog")
            ->with('name',"id")
        ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('boxLogs.show')
            ->with('data',$data)
            ->with('name',"id")
            ->with('plural',"zones")
            ->with('singular',"boxLog")
        ;
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

        $endpoint3 = "boxLogs/".$id;
        $url3 = $base_url.$endpoint3;
        $data = Http::withToken($token)->get($url3)->json();

        $endpoint4 = "boxes";
        $url4 = $base_url.$endpoint4;
        $boxes = Http::withToken($token)->get($url4)->json();

        $endpoint5 = "users";
        $url5 = $base_url.$endpoint5;
        $users = Http::withToken($token)->get($url5)->json();

        $endpoint6 = "positions";
        $url6 = $base_url.$endpoint6;
        $positions = Http::withToken($token)->get($url6)->json();


        return view('boxLogs.edit')
            ->with('data',$data)
            ->with('zones',$zones)
            ->with('logActions',$actions)
            ->with('boxes',$boxes)
            ->with('users',$users)
            ->with('positions',$positions)
            ->with('plural',"boxLogs")
            ->with('singular',"boxLog")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs/".$id;
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
                'user_id' => $request->user_id,
                'position_id' => $request->position_id,
                'box_id' => $request->box_id,
            ]
        );

        return redirect()->route('boxLogs.index');
    }

    public function create(){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint2 = "logActions";
        $url2 = $base_url.$endpoint2;
        $actions = Http::withToken($token)->get($url2)->json();

        $endpoint3 = "boxes";
        $url3 = $base_url.$endpoint3;
        $boxes = Http::withToken($token)->get($url3)->json();

        $endpoint4 = "users";
        $url4 = $base_url.$endpoint4;
        $users = Http::withToken($token)->get($url4)->json();

        $endpoint5 = "zones";
        $url5 = $base_url.$endpoint5;
        $zones = Http::withToken($token)->get($url5)->json();

        $endpoint6 = "positions";
        $url6 = $base_url.$endpoint6;
        $positions = Http::withToken($token)->get($url6)->json();

        return view('boxLogs.create')
            ->with('logActions',$actions)
            ->with('boxes',$boxes)
            ->with('users',$users)
            ->with('zones',$zones)
            ->with('positions',$positions)
            ->with('plural',"boxLogs")
            ->with('singular',"boxLog")
            ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs";
        $url = $base_url.$endpoint;

        $data = Http::withToken($token)->post($url,
            [
                'zone_id' => $request->zone_id,
                'log_action_id' => $request->log_action_id,
                'user_id' => $request->user_id,
                'position_id' => $request->position_id,
                'box_id' => $request->box_id,

            ]
        );

        return redirect()->route('boxLogs.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('boxLogs.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('boxLogs.deleted');
    }

    public function restore($id)
    {
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxLogs/" . $id . "/restore";
        $url = $base_url . $endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('boxLogs.deleted');
    }
}
