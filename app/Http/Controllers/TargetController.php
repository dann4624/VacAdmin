<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TargetController extends Controller
{
    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('targets.index')
            ->with('data',$data)
            ->with('plural',"targets")
            ->with('singular',"target")
            ->with('name',"name")
            ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('targets.deleted')
            ->with('data',$data)
            ->with('plural',"targets")
            ->with('singular',"target")
            ->with('name',"name")
        ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('targets.show')
            ->with('data',$data)
            ->with('plural',"targets")
            ->with('singular',"target");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('targets.edit')
            ->with('data',$data)
            ->with('plural',"targets")
            ->with('singular',"target")
            ->with('name',"name")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('targets.index');
    }

    public function create(){
        return view('targets.create')
            ->with('plural',"targets")
            ->with('singular',"target")
            ;;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('targets.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('targets.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('targets.deleted');
    }

    public function restore($id)
    {
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "targets/" . $id . "/restore";
        $url = $base_url . $endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('targets.deleted');
    }
}
