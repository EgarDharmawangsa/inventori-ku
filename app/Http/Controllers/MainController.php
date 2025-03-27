<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class MainController extends Controller
{
    public function dashboard() {
        return view("dasbor", [
            "judul" => "Dasbor",
            "jumlah_admin" => User::where('role_id', 1)->count(),
            "jumlah_nonadmin" => User::where('role_id', 2)->count(),
            "jumlah_barang" => Item::count(),
            "petugass_aktif" => User::where("is_online", true)->get()
        ]);
    }

    public function other() {
        return view("lainnya", [
            "judul" => "Lainnya"
        ]);
    }
}
