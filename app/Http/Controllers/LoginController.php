<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data))
        {
            activity("login")->withProperties(
                 [
                     'menu' => request()->segment(1),
                     "event" => "Login",
                     "user_id" => Auth::user()->id,
                     "User_name" => Auth::user()->name,
                     "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
                 ]
                 )->log('User ' . Auth::User()->name . ' Login On ' . Carbon::now()->timezone("Asia/Jakarta"));
            return redirect('dashboard');
        }
        else
        {
            return redirect('/');
        }
    }
    public function actionLogout(Request $request)
    {
        activity("logout")->withProperties(
             [
                 'menu' => request()->segment(1),
                 "event" => "Logout",
                 "user_id" => Auth::user()->id,
                 "User_name" => Auth::user()->name,
                 "time" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d H:i:s"),
             ]
             )->log('User ' . Auth::User()->name . ' Logout On ' . Carbon::now()->timezone("Asia/Jakarta"));
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    function dashboard()
    {
        $datadatebooking = [];
        $data_date = [
            "January" => 0,
            "February" => 0,
            "March" => 0,
            "April" => 0,
            "May" => 0,
            "June" => 0,
            "July" => 0,
            "August" => 0,
            "September" => 0,
            "October" => 0,
            "November" => 0,
            "December" => 0
        ];
        $getdate = DB::table("booking")->where("requested_date", ">=", Carbon::now()->format("Y-m-d"))->where("is_deleted", "=", "0")->get(["requested_date", "durasi"]);
        $get_booking_request_today = DB::table("booking")->where(["booking_steps" => "requested", "requested_date" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d"), "is_deleted" => "0"]);
        $get_request_maintenance_today = DB::table("maintenance_history")->where(["status" => "pending", "maintenance_date" => Carbon::now()->timezone("Asia/Jakarta")->format("Y-m-d"), "is_deleted" => "0"]);
        $booking_requested = DB::table("booking")->where(["booking_steps" => "requested", "is_deleted" => "0"]);
        $get_booking_rejected = DB::table("booking")->where(["booking_steps" => "rejected", "is_deleted" => "0"]);
        $booking_approved = DB::table("booking")->where(["booking_steps" => "approved", "is_deleted" => "0"]);
        $booking_done = DB::table("booking")->where(["booking_steps" => "done", "is_deleted" => "0"]);
        $maintenance_pending = DB::table("maintenance_history")->where(["status" => "pending", "is_deleted" => "0"]);
        $maintenance_on_progress = DB::table("maintenance_history")->where(["status" => "on progress", "is_deleted" => "0"]);
        $maintenance_done = DB::table("maintenance_history")->where(["status" => "done", "is_deleted" => "0"]);
        $chart_vehicle_usage = DB::table("kendaraan as k")->select("k.id", "k.nama", DB::raw("count(b.id) as 'total_usage'"))->leftJoin("booking as b", "k.id", "=", "b.id_kendaraan")->groupBy("k.id", "k.nama");
        $chart_vehicle_booking_bydate = DB::table("kendaraan as k")->select(DB::raw("DATE_FORMAT(b.requested_date,'%M') as 'date_requested',count(k.id) as 'total_vehicle'"))->join("booking as b", "k.id", "=", "b.id_kendaraan")->where("is_deleted", "=", "0")->where(DB::raw("DATE_FORMAT(b.requested_date,'%Y')"), "=", Carbon::now()->format('Y'))->groupBy("date_requested")->get()->toArray();
        $chart_vehicle_maintenance_bydate = DB::table("kendaraan as k")->select(DB::raw("DATE_FORMAT(b.maintenance_date,'%M') as 'date_maintenance',count(k.id) as 'total_vehicle'"))->join("maintenance_history as b", "k.id", "=", "b.id_kendaraan")->where("is_deleted", "=", "0")->where(DB::raw("DATE_FORMAT(b.maintenance_date,'%Y')"), "=", Carbon::now()->format('Y'))->groupBy("date_maintenance")->get();

        if (Auth::user()->level == "pegawai")
        {
            $get_booking_request_today->where("booking_status_by", "=", Auth::user()["id"]);
            $booking_requested->where("booking_status_by", "=", Auth::user()["id"]);
            $get_booking_rejected->where("booking_status_by", "=", Auth::user()["id"]);
            $booking_approved->where("booking_status_by", "=", Auth::user()["id"]);
            $booking_done->where("booking_status_by", "=", Auth::user()["id"]);
            $chart_vehicle_usage->where("booking_status_by", "=", Auth::user()["id"]);
        }

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
        if (isset($chart_vehicle_booking_bydate))
        {
            foreach ($chart_vehicle_booking_bydate as $key_booking_date => $value_booking_date)
            {
                if (array_key_exists($value_booking_date->date_requested, $data_date))
                {
                    $data_date[$value_booking_date->date_requested] = $value_booking_date->total_vehicle;
                }
            }
        }
        $data["chart_vehicle_booking_bydate"] = $data_date;
        if (isset($chart_vehicle_maintenance_bydate))
        {
            foreach ($chart_vehicle_maintenance_bydate as $key_maintenance_date => $value_maintenance_date)
            {
                if (array_key_exists($value_maintenance_date->date_maintenance, $data_date))
                {
                    $data_date[$value_maintenance_date->date_maintenance] = $value_maintenance_date->total_vehicle;
                }
            }
        }

        $data["today_request_booking"] = $get_booking_request_today->count();
        $data["today_request_maintenance"] = $get_request_maintenance_today->count();
        $data["booking_requested"] = $booking_requested->count();
        $data["booking_rejected"] = $get_booking_rejected->count();
        $data["booking_approved"] = $booking_approved->count();
        $data["booking_done"] = $booking_done->count();
        $data["maintenance_pending"] = $maintenance_pending->count();
        $data["maintenance_on_progress"] = $maintenance_on_progress->count();
        $data["maintenance_done"] = $maintenance_done->count();
        $data["chart_vehicle_usage"] = $chart_vehicle_usage->get();
        $data["datebooking"] = $datadatebooking;
        $data["chart_vehicle_maintenance_bydate"] = $data_date;

        return view("dashboard", $data);
    }
}
