@extends('layout.main')

@section('container')
    <h2 class="mb-3">{{ $judul }}</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card bg-primary custom-card-count">
                <div class="card-body">
                    <div class="card-title">Jumlah Admin</div>
                    <h1 class="text-end">{{ $jumlah_admin }}</h1>
                    <hr class="mt-0 mb-1">
                    <div class="text-end">
                        <a class="card-link custom-card-link" href="/petugass?role=Admin">Lihat detail <i
                                class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-danger custom-card-count">
                <div class="card-body">
                    <div class="card-title">Jumlah Non-Admin</div>
                    <h1 class="text-end">{{ $jumlah_nonadmin }}</h1>
                    <hr class="mt-0 mb-1">
                    <div class="text-end">
                        <a class="card-link custom-card-link" href="/petugass?role=Non-Admin">Lihat detail <i
                                class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-success custom-card-count">
                <div class="card-body">
                    <div class="card-title">Jumlah Barang</div>
                    <h1 class="text-end">{{ $jumlah_barang }}</h1>
                    <hr class="mt-0 mb-1">
                    <div class="text-end">
                        <a class="card-link custom-card-link" href="/barangs?">Lihat detail <i
                                class="bi bi-arrow-right-circle-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h4 class="mb-3">Data Statistik</h4>
    <div class="row">
        <div class="col-md-4 justify-content-center mb-3">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="col-md-8 mb-3">
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <hr>

    <h4 class="mb-3">Daftar Petugas Sedang Aktif</h4>
    </h4>
    <div class="table-responsive mb-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr class="bg-warning text-dark">
                    <th class="text-center">ID</th>
                    <th>Nama</th>
                    <th class="text-center">Role</th>
                </tr>
            </thead>
            <tbody id="activeUsersTable">
            </tbody>
        </table>
    </div>
@endsection
