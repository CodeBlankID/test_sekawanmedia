<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class JabatanController extends Controller
{
    function getJabatan()
    {

        $datamodel = new DataModel;
        $data["items"] = $datamodel->getDataSingleTable("jabatan");
        activity("jabatan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Read",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Read Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return view("jabatan.jabatan", $data);
    }
    function addAction(Request $req)
    {
        $result = DB::table("jabatan")->insert([
            'jabatan' => $req["jabatan"],
            'deskripsi' => $req["deskripsi"],
        ]);
        activity("jabatan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Add",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Add Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("jabatan");
    }
    function edit($id)
    {
        $data["items"] = DB::table("jabatan")->where("id", "=", $id)->first();
        return view("jabatan.formjabatan", $data);
    }
    function editAction(Request $request)
    {
        DB::table('jabatan')
        ->where('id', $request["id"])
        ->update([
            'jabatan' => $request["jabatan"],
            'deskripsi' => $request["deskripsi"],
        ]);
        activity("jabatan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Edit",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Edit Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("jabatan");
    }
    function delete($id)
    {
        $data = DB::table('jabatan')->where('id', '=', $id)->delete();
        activity("jabatan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Delete",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Delete Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("jabatan");
    }
}
