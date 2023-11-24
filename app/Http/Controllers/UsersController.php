<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    function getUser()
    {

        $data["items"] = DB::table("users")->selectRaw("users.*,jabatan.jabatan as nama_jabatan")->join("jabatan", "jabatan.id", "=", "users.id_jabatan")->get();
        return view("users.users", $data);
    }
    function add()
    {
        $data["jabatan"] = DB::table("jabatan")->get();
        return view("users.formusers", $data);
    }
    function addAction(Request $req)
    {
        $result = DB::table("users")->insert([
            'name' => $req["name"],
            'email' => $req["email"],
            'password' => bcrypt($req["password"]),
            'alamat' => $req["alamat"],
            'no_hp' => $req["no_hp"],
            'id_jabatan' => $req["id_jabatan"],
            'level' => $req["level"],
            'status' => $req["status"]
        ]);
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
        DB::table('users')
        ->where('id', $req["id"])
        ->update([
            'name' => $req["name"],
            'email' => $req["email"],
            'password' => bcrypt($req["password"]),
            'alamat' => $req["alamat"],
            'no_hp' => $req["no_hp"],
            'id_jabatan' => $req["id_jabatan"],
            'level' => $req["level"],
            'status' => $req["status"]
        ]);
        return redirect("users");
    }
    function delete($id)
    {
        $data = DB::table('users')->where('id', '=', $id)->delete();
        return redirect("users");
    }
}
