<?php

namespace App\Http\Controllers;

use App\Http\Exports\ExportsMaintenance;
use Carbon\Carbon;
use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Exports\ExportsBooking;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KendaraanController extends Controller
{
    function getKendaraan()
    {
        $data["items"] = DB::table("kendaraan")->selectRaw("kendaraan.*,lokasi.lokasi")->join("lokasi", "kendaraan.id_lokasi", "=", "lokasi.id")->get();
        activity("kendaraan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Read",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Read Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return view("kendaraan.kendaraan", $data);
    }
    function addAction(Request $req)
    {
        $result = DB::table("kendaraan")->insert([
            'nama' => $req["nama"],
            'kategori' => $req["kategori"],
            'jenis' => $req["jenis"],
            'nomor' => $req["nomor"],
            'status' => $req["status"],
            'id_lokasi' => $req["id_lokasi"],
            'jadwal_servis' => $req["jadwal_servis"],
            'deskripsi' => $req["deskripsi"],
        ]);
        activity("kendaraan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Add",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Add Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("kendaraan");
    }
    function edit($id)
    {
        $data["lokasi"] = DB::table("lokasi")->get();
        $data["items"] = DB::table("kendaraan")->where("id", "=", $id)->first();
        return view("kendaraan.formkendaraan", $data);
    }
    function editAction(Request $req)
    {
        DB::table('kendaraan')
        ->where('id', $req["id"])
        ->update([
            'nama' => $req["nama"],
            'kategori' => $req["kategori"],
            'jenis' => $req["jenis"],
            'nomor' => $req["nomor"],
            'status' => $req["status"],
            'id_lokasi' => $req["id_lokasi"],
            'jadwal_servis' => $req["jadwal_servis"],
            'deskripsi' => $req["deskripsi"],
        ]);
        activity("kendaraan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Edit",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Edit Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("kendaraan");
    }
    function delete($id)
    {
        $data = DB::table('kendaraan')->where('id', '=', $id)->delete();
        activity("kendaraan")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Delete",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Delete Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("kendaraan");
    }
    function bookingRequest(?string $id)
    {
        $datadatebooking = [];
        $getdate = DB::table("booking")->where("requested_date", ">=", Carbon::now()->format("Y-m-d"))->where("id_kendaraan", "=", $id)->where("is_deleted", "=", "0")->get(["requested_date", "durasi"]);
        if (!empty($getdate))
        {
            foreach ($getdate as $key => $value)
            {
                for ($i = 0; $i < $value->durasi; $i++)
                {
                    array_push($datadatebooking, date('Y-m-d', strtotime($value->requested_date . " + {$i} days")));
                }
            }
        }
        $data["datebooking"] = $datadatebooking;
        $data["kendaraan"] = DB::table("kendaraan")->select("id", "nama")->where("id", $id)->first();
        $data["users"] = DB::table("users")->select("id", "name")->where("level", "pegawai")->get();
        return view("kendaraan.formbooking", $data);
    }
    function addBooking(Request $req)
    {
        $dataInsert = [
            "id_kendaraan" => $req["id_kendaraan"],
            "id_users" => Auth::user()["id"],
            "durasi" => $req["durasi"],
            "deskripsi" => $req["deskripsi"],
            "booking_status_by" => $req["booking_status_by"],
            "id_requested_by" => Auth::user()["id"],
            "id_driver" => $req["id_driver"],
            "booking_steps" => "requested",
            "requested_date" => $req["requested_date"],
        ];
        DB::table("booking")->insert($dataInsert);
        activity("booking")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Add",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Add Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("booking");
    }
    function getDataBooking(Request $req)
    {
        $query = DB::table("booking")->selectRaw("booking.*, b.name as approval_user, c.name as driver,kendaraan.nama as kendaraan_name,kendaraan.nomor as nomor_kendaraan, d.name as requested_by")->join("users as a", "booking.id_users", "=", "a.id")->join("users as b", "booking.booking_status_by", "=", "b.id")->join("users as c", "booking.id_driver", "=", "c.id")->join("kendaraan", "booking.id_kendaraan", "=", "kendaraan.id")->join("users as d", "booking.id_requested_by", "=", "d.id")->where("is_deleted", 0);
        $filter_vehicle = DB::table("kendaraan")->select("kendaraan.id", "kendaraan.nama")->join("booking", "booking.id_kendaraan", "=", "kendaraan.id")->where("is_deleted", "=", "0")->groupBy("kendaraan.id", "kendaraan.nama");
        $filter_date = DB::table("booking")->where("is_deleted", "=", "0");
        if (Auth::user()->level == "pegawai")
        {
            $query->where("booking_status_by", "=", Auth::user()["id"]);
            $filter_vehicle->where("booking.booking_status_by", "=", Auth::user()["id"]);
            $filter_date->where("booking_status_by", "=", Auth::user()["id"]);
        }

        if (!empty($req->keys()[0]))
        {
            switch ($req->keys()[0])
            {
                case 'status':
                    if (!empty($req->status))
                    {
                        $query->where("booking_steps", $req->status);
                    }
                    break;
                case 'vehicle':
                    if (!empty($req->vehicle))
                    {
                        $query->where("id_kendaraan", $req->vehicle);
                    }
                    break;
                case 'requested':
                    if (!empty($req->requested))
                    {
                        $query->where(DB::raw("(DATE_FORMAT(requested_date,'%m'))"), date("m", strtotime($req->requested)));
                    }
                    break;
                case 'year':
                    if (!empty($req->year))
                    {
                        $query->where(DB::raw("(DATE_FORMAT(requested_date,'%Y'))"), $req->year);
                    }
                    break;
            }
        }
        $data["databooking"] = $query->get();
        if (in_array("export", $req->keys()))
        {
            return Excel::download(new ExportsBooking($query->get()->toArray()), 'data_booking_' . $req->keys()[0] . ".xlsx");
        }
        $data["filter_vehicle"] = $filter_vehicle->get()->toArray();
        $data["filter_request_date"] = array_unique(array_column($filter_date->get()->toArray(), "requested_date"));
        $data["filter_request_date"] = array_unique(array_map(function ($date)
        {
            return date('F', strtotime($date));
        }, $data["filter_request_date"]));

        $data["filter_request_year"] = array_unique(array_column($filter_date->get()->toArray(), "requested_date"));
        $data["filter_request_year"] = array_unique(array_map(function ($year)
        {
            return date('Y', strtotime($year));
        }, $data["filter_request_year"]));
        activity("booking")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Read",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Read Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return view("booking.booking", $data);
    }
    function deleteBooking($id)
    {
        DB::table("booking")->where("id", $id)->update(["is_deleted" => 1]);
        activity("booking")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Delete",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Delete Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("booking");
    }
    function updateProgressBooking($status, $id)
    {
        $status = str_replace("-", " ", $status);
        switch ($status)
        {
            case 'mechanical check':
                DB::table("booking")->where("id", $id)->update(["mechanical_check_date" => Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')]);
                break;
            case 'approved':
                DB::table("booking")->where("id", $id)->update(["booking_status_date" => Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')]);
                break;
            case 'rejected':
                DB::table("booking")->where("id", $id)->update(["booking_status_date" => Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')]);
                break;
            case 'done':
                DB::table("booking")->where("id", $id)->update(["done_date" => Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s')]);
                break;
            default:
                break;
        }
        DB::table("booking")->where("id", $id)->update(["booking_steps" => $status]);
        activity("booking")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Edit",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Update Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("booking");
    }
    function maintenanceRequest($id)
    {
        $data["kendaraan"] = DB::table("kendaraan")->select("id", "nama")->where("id", $id)->first();
        $data["users"] = DB::table("users")->select("id", "name")->where("level", "pegawai")->get();
        return view("kendaraan.formmaintenance", $data);
    }
    function addMaintenance(Request $req)
    {
        $dataInsert = [
            "id_kendaraan" => $req["id_kendaraan"],
            "status" => $req["status"],
            "deskripsi" => $req["deskripsi"],
            "maintenance_date" => Carbon::now(),
        ];
        $status_insert = DB::table("maintenance_history")->insert($dataInsert);
        if ($status_insert)
        {
            DB::table("kendaraan")->where("id", $req["id_kendaraan"])->update(["status" => "maintenance"]);
        }
        activity("maintenance")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Add",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Add Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("maintenance");
    }
    function getDataMaintenance(Request $req)
    {

        $query = DB::table("maintenance_history")->selectRaw("maintenance_history.*, kendaraan.nama as kendaraan_name,kendaraan.nomor as nomor_kendaraan,kendaraan.jadwal_servis")->join("kendaraan", "maintenance_history.id_kendaraan", "=", "kendaraan.id")->where("is_deleted", 0);
        $filter_vehicle = DB::table("kendaraan")->select("kendaraan.id", "kendaraan.nama")->join("maintenance_history", "maintenance_history.id_kendaraan", "=", "kendaraan.id")->where("is_deleted", "=", "0")->groupBy("kendaraan.id", "kendaraan.nama");
        $filter_date = DB::table("maintenance_history")->where("is_deleted", "=", "0");
        if (!empty($req->keys()[0]))
        {
            switch ($req->keys()[0])
            {
                case 'status':
                    if (!empty($req->status))
                    {
                        if ($req->status == "on-progress")
                        {
                            $req->status = str_replace("-", " ", $req->status);
                        }
                        $query->where("maintenance_history.status", $req->status);
                    }
                    break;
                case 'vehicle':
                    if (!empty($req->vehicle))
                    {
                        $query->where("id_kendaraan", $req->vehicle);
                    }
                    break;
                case 'requested':
                    if (!empty($req->requested))
                    {
                        $query->where(DB::raw("(DATE_FORMAT(maintenance_date,'%m'))"), date("m", strtotime($req->requested)));
                    }
                    break;
                case 'year':
                    if (!empty($req->year))
                    {
                        $query->where(DB::raw("(DATE_FORMAT(maintenance_date,'%Y'))"), $req->year);
                    }
                    break;
            }
        }
        $data["datamaintenance"] = $query->get();
        if (in_array("export", $req->keys()))
        {
            return Excel::download(new ExportsMaintenance($query->get()->toArray()), 'data_Maintenance_' . $req->keys()[0] . ".xlsx");
        }
        $data["filter_vehicle"] = $filter_vehicle->get()->toArray();
        $data["filter_maintenance_date"] = array_unique(array_column($filter_date->get()->toArray(), "maintenance_date"));
        $data["filter_maintenance_date"] = array_unique(array_map(function ($date)
        {
            return date('F', strtotime($date));
        }, $data["filter_maintenance_date"]));

        $data["filter_maintenance_year"] = array_unique(array_column($filter_date->get()->toArray(), "maintenance_date"));
        $data["filter_maintenance_year"] = array_unique(array_map(function ($year)
        {
            return date('Y', strtotime($year));
        }, $data["filter_maintenance_year"]));
        activity("maintenance")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Read",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Read Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return view("booking.maintenance", $data);
    }
    function updateStatusMaintenance($status, $id)
    {
        $status = str_replace("-", " ", $status);
        $status_update = DB::table("maintenance_history")->where("id", $id)->update(["status" => $status]);
        if ($status_update)
        {
            $status_maintenance = DB::table("maintenance_history")->where("id", $id)->first(["status", "id_kendaraan"]);
            if ($status_maintenance->status == "done")
            {
                DB::table("kendaraan")->where("id", $status_maintenance->id_kendaraan)->update(["status" => "available"]);
            }
            else
            {
                DB::table("kendaraan")->where("id", $status_maintenance->id_kendaraan)->update(["status" => "maintenance"]);
            }
        }
        activity("maintenance")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Edit",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Update Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("maintenance");
    }
    function deleteMaintenance($id)
    {
        DB::table("maintenance_history")->where("id", $id)->update(["is_deleted" => 1]);
        activity("maintenance")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Delete",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Delete Menu ' . request()->segment(1) . ' On ' . Carbon::now()->timezone("Asia/Jakarta"));
        return redirect("maintenance");
    }
}
