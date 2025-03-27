<div class="offcanvas offcanvas-start bg-dark text-white custom-offcanvas-sidebar" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title m-0">Menu</h5>
        <button type="button" class="btn-close btn-close-white m-0" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body pt-0 d-flex flex-column">
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item">
                <a class="nav-link text-white {{ $judul === 'Dasbor' ? 'active-link' : '' }}" href="/"><i class="bi bi-speedometer me-3"></i>Dasbor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ in_array($judul, ['Daftar Petugas', 'Tambah Petugas', 'Edit Petugas']) ? 'active-link' : '' }}" href="/petugass"><i class="bi bi-people-fill me-3"></i>Daftar Petugas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ in_array($judul, ['Daftar Barang', 'Tambah Barang', 'Edit Barang']) ? 'active-link' : '' }}" href="/barangs"><i class="bi bi-box2-fill me-3"></i>Daftar Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $judul === 'Lainnya' ? 'active-link' : '' }}" href="/lainnya"><i class="bi bi-three-dots me-3"></i>Lainnya</a>
            </li>
            
            <hr class="mt-auto mb-3"/>
            <li class="nav-item d-flex justify-content-between align-items-center">
                <a class="nav-link text-white flex-grow-1 {{ $judul === 'Profil' ? 'active-link' : '' }}" href="/profil"><i class="bi bi-person-fill me-2"></i>Profil</a>

                <form action="/logout" method="POST" class="ms-2">
                    @csrf
                    <button type="submit" class="btn btn-danger text-white h-100"><i
                        class="bi bi-box-arrow-right me-2"></i>Keluar</button>
                </form>
            </li>
        </ul>
    </div>
</div>
