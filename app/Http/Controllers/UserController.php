<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("petugas.daftar-petugas", [
            "judul" => "Daftar Petugas",
            "petugass" => User::with('role')->filter(request(['petugas', 'role']))->paginate(15)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("petugas.tambah-petugas", [
            "judul" => "Tambah Petugas",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedDataPetugas = $request->validate([
            'namaPetugas' => 'required|max:255',
            'usernamePetugas' => 'required|min:5|max:255|unique:users,username',
            'emailPetugas' => 'required|email:dns|unique:users,email',
            'passwordPetugas' => 'required|min:5|max:255',
            'role_id' => 'required'
        ]);

        $validatedDataPetugas['passwordPetugas'] = Hash::make($validatedDataPetugas['passwordPetugas']);

        User::create([
            'name' => $validatedDataPetugas['namaPetugas'],
            'username' => $validatedDataPetugas['usernamePetugas'],
            'email' => $validatedDataPetugas['emailPetugas'],
            'password' => $validatedDataPetugas['passwordPetugas'],
            'role_id' => $validatedDataPetugas['role_id']
        ]);

        return redirect("/petugass")->with('successPetugas','Berhasil menambahkan data Petugas');
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $petugas)
    {
        return view('petugas.edit-petugas', [
            "judul" => "Edit Petugas",
            "petugas" => $petugas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:5|max:255',
            'role_id' => 'required'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:5|max:255|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|min:5|max:255|unique:users|email:dns';
        }

        $validatedDataPetugas = $request->validate($rules);

        $rules['password'] = Hash::make($rules['password']);

        User::where('id', $user->id)->update($validatedDataPetugas);

        return redirect("/petugass")->with('successPetugas','Berhasil memperbarui data Petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $petugas)
    {
        Item::where('user_id', $petugas->id)->delete();
        User::destroy($petugas->id);
        return redirect("/petugass")->with('successPetugas','Berhasil menghapus data Petugas');
    }

    public function profile() {
        return view("profil", [
            "judul" => "Profil"
        ]);
    }

    // API
    public function getPieChartData() {
        return response()->json([
            "jumlah_admin" => User::where('role_id', 1)->count(),
            "jumlah_nonadmin" => User::where('role_id', 2)->count()
        ]);
    }

    public function getActiveUsers() {
        return response()->json([
            "petugass_aktif" => User::where('is_online', 1)->get(),
        ]);
    }
}