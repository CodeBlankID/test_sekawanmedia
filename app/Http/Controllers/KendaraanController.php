<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    function getKendaraan()
    {
        $datamodel = new DataModel;
        $data["items"] = $datamodel->getDataSingleTable("kendaraan");
        return view("kendaraan.kendaraan", $data);
    }
}
