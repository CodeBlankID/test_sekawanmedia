<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    function getLogData()
    {
        $data["users"] = [];
        $data["jabatan"] = [];
        $data["lokasi"] = [];
        $data["kendaraan"] = [];
        $data["booking"] = [];
        $data["maintenance"] = [];
        $lastActivity = Activity::all("log_name", "properties")->toArray();
        foreach ($lastActivity as $key_log => $value_log)
        {

            switch ($value_log["log_name"])
            {
                case 'users':
                    switch ($value_log["properties"]["event"])
                    {
                        case "Read":
                            $data["users"]["read"][] = $value_log["properties"];
                            break;
                        case "Add":
                            $data["users"]["add"][] = $value_log["properties"];
                            break;
                        case "Edit":
                            $data["users"]["edit"][] = $value_log["properties"];
                            break;
                        case "Delete":
                            $data["users"]["delete"][] = $value_log["properties"];
                            break;
                        default:
                            break;
                    }
                    break;
                case "jabatan":
                    switch ($value_log["properties"]["event"])
                    {
                        case "Read":
                            $data["jabatan"]["read"][] = $value_log["properties"];
                            break;
                        case "Add":
                            $data["jabatan"]["add"][] = $value_log["properties"];
                            break;
                        case "Edit":
                            $data["jabatan"]["edit"][] = $value_log["properties"];
                            break;
                        case "Delete":
                            $data["jabatan"]["delete"][] = $value_log["properties"];
                            break;
                        default:
                            break;
                    }
                    break;
                case "lokasi":
                    switch ($value_log["properties"]["event"])
                    {
                        case "Read":
                            $data["lokasi"]["read"][] = $value_log["properties"];
                            break;
                        case "Add":
                            $data["lokasi"]["add"][] = $value_log["properties"];
                            break;
                        case "Edit":
                            $data["lokasi"]["edit"][] = $value_log["properties"];
                            break;
                        case "Delete":
                            $data["lokasi"]["delete"][] = $value_log["properties"];
                            break;
                        default:
                            break;
                    }
                    break;
                case "kendaraan":
                    switch ($value_log["properties"]["event"])
                    {
                        case "Read":
                            $data["kendaraan"]["read"][] = $value_log["properties"];
                            break;
                        case "Add":
                            $data["kendaraan"]["add"][] = $value_log["properties"];
                            break;
                        case "Edit":
                            $data["kendaraan"]["edit"][] = $value_log["properties"];
                            break;
                        case "Delete":
                            $data["kendaraan"]["delete"][] = $value_log["properties"];
                            break;
                        default:
                            break;
                    }
                    break;
                case "booking":
                    switch ($value_log["properties"]["event"])
                    {
                        case "Read":
                            $data["booking"]["read"][] = $value_log["properties"];
                            break;
                        case "Add":
                            $data["booking"]["add"][] = $value_log["properties"];
                            break;
                        case "Edit":
                            $data["booking"]["edit"][] = $value_log["properties"];
                            break;
                        case "Delete":
                            $data["booking"]["delete"][] = $value_log["properties"];
                            break;
                        default:
                            break;
                    }
                    break;
                case "maintenance":
                    switch ($value_log["properties"]["event"])
                    {
                        case "Read":
                            $data["maintenance"]["read"][] = $value_log["properties"];
                            break;
                        case "Add":
                            $data["maintenance"]["add"][] = $value_log["properties"];
                            break;
                        case "Edit":
                            $data["maintenance"]["edit"][] = $value_log["properties"];
                            break;
                        case "Delete":
                            $data["maintenance"]["delete"][] = $value_log["properties"];
                            break;
                        default:
                            break;
                    }
                    break;
                default:
                    break;
            }
        }
        return view("log.log", $data);
    }
}
