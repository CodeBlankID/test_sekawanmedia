<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{

    function getLokasi()
    {
        $datamodel = new DataModel;
        $data["items"] = $datamodel->getDataSingleTable("lokasi");
        activity("lokasi")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Read",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Read Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return view("lokasi.lokasi", $data);
    }
    function addAction(Request $req)
    {
        $result = DB::table("lokasi")->insert([
            'lokasi' => $req["lokasi"],
            'deskripsi' => $req["deskripsi"],
        ]);
        activity("lokasi")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Add",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Add Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("lokasi");
    }
    function edit($id)
    {
        $data["items"] = DB::table("lokasi")->where("id", "=", $id)->first();

        return view("lokasi.formlokasi", $data);
    }
    function editAction(Request $request)
    {
        DB::table('lokasi')
        ->where('id', $request["id"])
        ->update([
            'lokasi' => $request["lokasi"],
            'deskripsi' => $request["deskripsi"],
        ]);
        activity("lokasi")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Edit",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Edit Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("lokasi");
    }
    function delete($id)
    {
        $data = DB::table('lokasi')->where('id', '=', $id)->delete();
        activity("lokasi")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Delete",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Delete Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("lokasi");
    }
}
