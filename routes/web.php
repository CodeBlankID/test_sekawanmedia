<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware("auth")->group(function ()
{

    Route::get('/', fn() => view('login'));
    Route::get('/dashboard', [LoginController::class, "dashboard"]);
    Route::get("/users", [UsersController::class, "getUser"]);
    Route::get("/jabatan", [JabatanController::class, "getJabatan"]);
    Route::get("/lokasi", [LokasiController::class, "getLokasi"]);
    Route::get("/kendaraan", [KendaraanController::class, "getKendaraan"]);
    Route::get("/booking", fn() => view("booking.booking"));

    Route::get("/addjabatan", fn() => view("jabatan.formjabatan"));
    Route::post("/addactionjabatan", [JabatanController::class, "addAction"]);
    Route::get("/editjabatan/{id}", [JabatanController::class, "edit"]);
    Route::post("/editactionjabatan", [JabatanController::class, "editAction"]);
    Route::get("/deletejabatan/{id}", [JabatanController::class, "delete"]);

    Route::get("/addlokasi", fn() => view("lokasi.formlokasi"));
    Route::post("/addactionlokasi", [LokasiController::class, "addAction"]);
    Route::get("/editlokasi/{id}", [LokasiController::class, "edit"]);
    Route::post("/editactionlokasi", [LokasiController::class, "editAction"]);
    Route::get("/deletelokasi/{id}", [LokasiController::class, "delete"]);

    Route::get("/addusers", [UsersController::class, "add"]);
    Route::post("/addactionusers", [UsersController::class, "addAction"]);
    Route::get("/editusers/{id}", [UsersController::class, "edit"]);
    Route::post("/editactionusers", [UsersController::class, "editAction"]);
    Route::get("/deleteusers/{id}", [UsersController::class, "delete"]);

    Route::get("/addkendaraan", function ()
    {
        $data["lokasi"] = DB::table("lokasi")->get();
        return view("kendaraan.formkendaraan", $data);

    });
    Route::post("/addactionkendaraan", [KendaraanController::class, "addAction"]);
    Route::get("/editkendaraan/{id}", [KendaraanController::class, "edit"]);
    Route::post("/editactionkendaraan", [KendaraanController::class, "editAction"]);
    Route::get("/deletekendaraan/{id}", [KendaraanController::class, "delete"]);

    Route::get("/requestbooking/{id}", [KendaraanController::class, "bookingRequest"]);
    Route::post("/addbooking", [KendaraanController::class, "addBooking"]);
    Route::get("/booking", [KendaraanController::class, "getDataBooking"]);
    Route::get("/deletebooking/{id}", [KendaraanController::class, "deleteBooking"]);
    Route::get("/updateprogressbooking/{status}/{id}", [KendaraanController::class, "updateProgressBooking"]);

    Route::get("/requestmaintenance/{id}", [KendaraanController::class, "maintenanceRequest"]);
    Route::get("/maintenance", [KendaraanController::class, "getDataMaintenance"]);
    Route::get("/deletemaintenance/{id}", [KendaraanController::class, "deleteMaintenance"]);
    Route::post("/addmaintenance", [KendaraanController::class, "addMaintenance"]);
    Route::get("/updatestatusmaintenance/{status}/{id}", [KendaraanController::class, "updateStatusMaintenance"]);

    Route::get("/log", [LogController::class, "getLogData"]);
});

Route::get("/register", fn() => view("register"));
Route::post("/login", [LoginController::class, "actionLogin"]);
Route::get("/logout", [LoginController::class, "actionLogout"]);

Route::fallback(fn() => view("404"));


