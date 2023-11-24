<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataModel extends Model
{
    use HasFactory;

    function getDataSingleTable($table)
    {
        return DB::table($table)->get();
    }
}
