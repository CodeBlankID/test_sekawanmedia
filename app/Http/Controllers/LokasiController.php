<?php

namespace App\Http\Controllers;

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
        activity()->log('User ' . Auth::user()["name"] . " Read data on Lokasi Menu");
        return view("lokasi.lokasi", $data);
    }

    function addAction(Request $req)
    {
        $result = DB::table("lokasi")->insert([
            'lokasi' => $req["lokasi"],
            'deskripsi' => $req["deskripsi"],
        ]);
        activity()->log('User ' . Auth::user()["name"] . " Add data on Lokasi Menu");
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
        activity()->log('User ' . Auth::user()["name"] . " Edit data on Lokasi Menu");
        return redirect("lokasi");
    }
    function delete($id)
    {
        $data = DB::table('lokasi')->where('id', '=', $id)->delete();
        activity()->log('User ' . Auth::user()["name"] . " Delete data on Lokasi Menu");
        return redirect("lokasi");
    }
}
