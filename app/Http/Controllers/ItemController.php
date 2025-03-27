<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("barang.daftar-barang", [
            "judul" => "Daftar Barang",
            "barangs" => Item::with('user')->filter(request('barang'))->paginate(15)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("barang.tambah-barang", [
            "judul" => "Tambah Barang",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedDataBarang = $request->validate([
            'namaBarang' => 'required|max:255',
            'stokBarang' => 'required|integer',
            'hargaBarang' => 'required|integer',
            'idPetugas' => 'required|integer|exists:users,id'
        ]);

        Item::create([
            'name' => $validatedDataBarang['namaBarang'],
            'stock' => $validatedDataBarang['stokBarang'],
            'price' => $validatedDataBarang['hargaBarang'],
            'user_id' => $validatedDataBarang['idUser']
        ]);

        return redirect("/barangs")->with('successBarang','Berhasil menambahkan data Barang');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Barang $barang)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $barang)
    {
        return view('barang.edit-barang', [
            "judul" => "Edit Barang",
            "barang" => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $barang)
    {
        $validatedDataBarang = $request->validate([
            'namaBarang' => 'required|max:255',
            'stokBarang' => 'required|integer',
            'hargaBarang' => 'required|integer',
            'idPetugas' => 'required|integer|exists:users,id'
        ]);

        $validatedDataBarang['id'] = $barang->id;

        Item::where('id', $barang->id)->update([
            'name' => $validatedDataBarang['namaBarang'],
            'stock' => $validatedDataBarang['stokBarang'],
            'price' => $validatedDataBarang['hargaBarang'],
            'user_id' => $validatedDataBarang['idUser']
        ]);

        return redirect("/barangs")->with('successBarang','Berhasil memperbarui data Barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $barang)
    {
        Item::destroy($barang->id);
        return redirect("/barangs")->with('successBarang','Berhasil menghapus data Barang');
    }
}
