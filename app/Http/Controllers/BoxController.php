<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class BoxController extends Controller
{

    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('boxes.index')
            ->with('data',$data)
            ->with('plural',"boxes")
            ->with('singular',"box")
            ->with('name',"name")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('boxes.deleted')
            ->with('data',$data)
            ->with('plural',"boxes")
            ->with('singular',"box")
            ->with('name',"name")
        ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('boxes.show')
            ->with('data',$data)
            ->with('plural',"boxes")
            ->with('singular',"box");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "boxes/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        $endpoint2 = "types";
        $url2 = $base_url.$endpoint2;
        $types = Http::withToken($token)->get($url2)->json();

        $endpoint3 = "positions";
        $url3 = $base_url.$endpoint3;
        $positions = Http::withToken($token)->get($url3)->json();

        return view('boxes.edit')
            ->with('data',$data)
            ->with('types',$types)
            ->with('positions',$positions)
            ->with('plural',"boxes")
            ->with('singular',"box")
            ->with('name',"name")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
                'batch' => $request->batch,
                'position_id' => $request->position_id,
                'type_id' => $request->type_id,
            ]
        );

        return redirect()->route('boxes.index');
    }

    public function create(){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint2 = "types";
        $url2 = $base_url.$endpoint2;
        $types = Http::withToken($token)->get($url2)->json();

        $endpoint3 = "positions";
        $url3 = $base_url.$endpoint3;
        $positions = Http::withToken($token)->get($url3)->json();

        return view('boxes.create')
            ->with('types',$types)
            ->with('positions',$positions)
            ->with('plural',"boxes")
            ->with('singular',"box")
            ->with('name',"name")
        ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
                'batch' => $request->batch,
                'position_id' => $request->position_id,
                'type_id' => $request->type_id,
            ]
        );

        return redirect()->route('boxes.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('boxes.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('boxes.deleted');
    }

    public function restore($id)
    {
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "boxes/" . $id . "/restore";
        $url = $base_url . $endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('boxes.deleted');
    }
}
