@extends('layout.main')

@section('container')
    @if (session()->has('successBarang'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('successBarang') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-3">{{ $judul }}</h2>

    <div class="mb-3">
        <form action="/barangs" class="row justify-content-end">
            @csrf
            @if (request('barang'))
                <input type="hidden" name="barang" value="{{ request('barang') }}">
            @endif
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari barang" name="barang"
                        value="{{ request('barang') }}">
                    <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-grid d-md-block mb-3">
        <a href="/barangs/create" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Tambah Barang</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th class="text-center">ID</th>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th class="text-center">Stok</th>
                    <th>Petugas</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td class="text-center">{{ $barang->id }}</td>
                        <td>{{ $barang->name }}</td>
                        <td>Rp {{ number_format($barang->price, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $barang->stock }}</td>
                        <td>{{ $barang->user->name }}</td>
                        <td class="text-center">{{ $barang->user->role->name }}</td>
                        <td class="text-nowrap text-center">
                            <a href="/barangs/{{ $barang->id }}/edit" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil me-2"></i>Edit
                            </a>
                            <form action="/barangs/{{ $barang->id }}" method="POST" class="d-inline">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus?')">
                                    <i class="bi bi-trash me-2"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center my-4">
        {{ $barangs->links() }}
    </div>
@endsection
