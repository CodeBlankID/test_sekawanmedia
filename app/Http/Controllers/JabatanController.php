<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    function getJabatan()
    {
        $datamodel = new DataModel;
        $data["items"] = $datamodel->getDataSingleTable("jabatan");
        activity()->log('User ' . Auth::user()["name"] . " Read data on Jabatan Menu");
        return view("jabatan.jabatan", $data);
    }
    function addAction(Request $req)
    {
        $result = DB::table("jabatan")->insert([
            'jabatan' => $req["jabatan"],
            'deskripsi' => $req["deskripsi"],
        ]);
        activity()->log('User ' . Auth::user()["name"] . " Add data on Jabatan Menu");
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
        activity()->log('User ' . Auth::user()["name"] . " Edit data on Jabatan Menu");
        return redirect("jabatan");
    }
    function delete($id)
    {
        activity()->log('User ' . Auth::user()["name"] . " Delete data on Jabatan Menu");
        $data = DB::table('jabatan')->where('id', '=', $id)->delete();
        return redirect("jabatan");
    }

}
