@extends('layout.main')

@section('container')
    <div class="container mt-4">
        <h2 class="text-center mb-4">{{ $judul }}</h2>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="/barangs" method="POST" class="p-4 border rounded bg-light custom-form-ae">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="namaBarang">Nama</label>
                        <input type="text" class="form-control @error('namaBarang') is-invalid @enderror" id="namaBarang"
                            name="namaBarang" required autofocus>
                        @error('namaBarang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hargaBarang">Harga</label>
                        <input type="text" class="form-control @error('hargaBarang') is-invalid @enderror" id="hargaBarang"
                            name="hargaBarang" required>
                        @error('hargaBarang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="stokBarang">Stok</label>
                        <input type="text" class="form-control @error('stokBarang') is-invalid @enderror" id="stokBarang"
                            name="stokBarang" required>
                        @error('stokBarang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="idPetugas">ID Petugas</label>
                        <input type="text" class="form-control @error('idPetugas') is-invalid @enderror" id="idPetugas" name="idPetugas"
                            required>
                        @error('idPetugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/barangs" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
