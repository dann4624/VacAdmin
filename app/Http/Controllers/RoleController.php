<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function index(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('roles.index')
            ->with('data',$data)
            ->with('plural',"roles")
            ->with('singular',"role")
            ->with('name',"name")
        ;
    }

    public function deleted(){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/deleted";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('roles.deleted')
            ->with('data',$data)
            ->with('plural',"roles")
            ->with('singular',"role")
            ->with('name',"name")
            ;
    }

    public function show($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('roles.show')
            ->with('data',$data)
            ->with('plural',"roles")
            ->with('singular',"role");
    }

    public function edit($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        return view('roles.edit')
            ->with('data',$data)
            ->with('plural',"roles")
            ->with('singular',"role")
            ->with('name',"name")
            ;
    }

    public function update($id,Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('roles.index');
    }

    public function create(){
        return view('roles.create')
            ->with('plural',"roles")
            ->with('singular',"role")
        ;
    }

    public function store(Request $request){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->post($url,
            [
                'name' => $request->name,
                'shelf_life' => $request->shelf_life,
                'minimum_temperature' => $request->minimum_temperature,
                'maximum_temperature' => $request->maximum_temperature,
            ]
        );

        return redirect()->route('roles.index');
    }

    public function destroy($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('roles.index');
    }

    public function delete_force($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/".$id."/force";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->delete($url);

        return redirect()->route('roles.deleted');
    }

    public function restore($id){
        $token = Session::get('token');
        $base_url = config('api.url');
        $endpoint = "roles/".$id."/restore";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url);

        return redirect()->route('roles.deleted');
    }

    public function permissions_form($id){
        $token = Session::get('token');
        $base_url = config('api.url');

        $endpoint = "roles/".$id;
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();
        $role_has_permissions = $data['permissions'];

        $role_permissions = [];
        foreach($role_has_permissions as $permission){
            array_push($role_permissions,$permission['name']);
        }


        $endpoint2 = "permissions/";
        $url2 = $base_url.$endpoint2;
        $data2 = Http::withToken($token)->get($url2)->json();



        return view('roles.permissions')
            ->with('data',$data)
            ->with('role_permissions',$role_permissions)
            ->with('permission_list',$data2)
            ->with('plural',"roles")
            ->with('singular',"permissions")
        ;
    }

    public function permissions_submit($id, Request $request){
        $permissions = [];

        $token = Session::get('token');
        $base_url = config('api.url');

        // Permissions related
        $endpoint = "permissions/";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->get($url)->json();

        foreach($data as $permission){
            $name = $permission['name'];
            if($request->$name != Null){
                array_push($permissions,$permission['id']);
            }
        }

        // Update Related
        $endpoint = "roles/".$id."/permissions";
        $url = $base_url.$endpoint;
        $data = Http::withToken($token)->put($url,
            [
                'permissions' => $permissions,
            ]
        );

        return redirect()->route('roles.permissions.form',['id' => $id]);
    }
}
