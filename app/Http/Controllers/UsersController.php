<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    function getUser()
    {
        $data["items"] = DB::table("users")->selectRaw("users.*,jabatan.jabatan as nama_jabatan")->join("jabatan", "jabatan.id", "=", "users.id_jabatan")->get();
        activity("users")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Read",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Read Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return view("users.users", $data);
    }
    function add()
    {
        $data["jabatan"] = DB::table("jabatan")->get();
        return view("users.formusers", $data);
    }
    function addAction(Request $req)
    {
        DB::table("users")->insert([
           'name' => $req["name"],
           'email' => $req["email"],
           'password' => bcrypt($req["password"]),
           'alamat' => $req["alamat"],
           'no_hp' => $req["no_hp"],
           'id_jabatan' => $req["id_jabatan"],
           'level' => $req["level"],
           'status' => $req["status"]
        ]);
        activity("users")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Add",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Add Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("users");
    }
    function edit($id)
    {
        $data["items"] = DB::table("users")->where("id", "=", $id)->first();
        $data["jabatan"] = DB::table("jabatan")->get();
        return view("users.formusers", $data);
    }
    function editAction(Request $req)
    {
        $data_update = [
            'name' => $req["name"],
            'email' => $req["email"],
            'alamat' => $req["alamat"],
            'no_hp' => $req["no_hp"],
            'id_jabatan' => $req["id_jabatan"],
            'level' => $req["level"],
            'status' => $req["status"]
        ];
        if (isset($req["change_password"]) && $req["change_password"] == "on")
        {
            $data_update = array_merge($data_update, array('password' => bcrypt($req["password"])));
        }
        DB::table('users')
        ->where('id', $req["id"])
        ->update($data_update);
        activity("users")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Edit",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Edit Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("users");
    }
    function delete($id)
    {
        $data = DB::table('users')->where('id', '=', $id)->delete();
        activity("users")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Delete",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Delete Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("users");
    }
}
