@extends('layout.main')

@section('container')
    @if (session()->has('successPetugas'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('successPetugas') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-3">{{ $judul }}</h2>

    <div class="mb-3">
        <form action="/petugass" class="row justify-content-end">
            @csrf
            @if (request('role'))
                <input type="hidden" name="role" value="{{ request('role') }}">
            @endif
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari petugas" name="petugas"
                        value="{{ request('petugas') }}">
                    <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="/petugass/create" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Tambah Petugas</a>

        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ request('role') ?? 'Semua' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/petugass">Semua</a></li>
                <li><a class="dropdown-item" href="/petugass?role=Admin">Admin</a></li>
                <li><a class="dropdown-item" href="/petugass?role=Non-Admin">Non Admin</a></li>
            </ul>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th class="text-center">ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($petugass as $petugas)
                    <tr>
                        <td class="text-center">{{ $petugas->id }}</td>
                        <td>{{ $petugas->name }}</td>
                        <td>{{ $petugas->username }}</td>
                        <td class="text-center">{{ $petugas->role->name }}</td>
                        <td class="text-nowrap text-center">
                            <a href="/petugass/{{ $petugas->id }}/edit" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil me-2"></i>Edit
                            </a>
                            <form action="/petugass/{{ $petugas->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus?')">
                                    <i class="bi bi-trash me-2"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Tidak ada data petugas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center my-4">
        {{ $petugass->links() }}
    </div>
@endsection
