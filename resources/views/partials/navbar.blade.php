<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            @auth
                <button class="bg-dark border-0 p-0 text-white custom-navbar-bars-icon" data-bs-toggle="offcanvas" data-bs-target="#sidebar">☰</button>
            @endauth
            <a class="navbar-brand" href="/">
                <b><i>InventoriKu</i><span class="version-label">v1.0</span></b>
            </a>
        </div>
        @auth
            <p class="text-white m-0">Selamat datang, {{ auth()->user()->name }}</p>
        @endauth
    </div>
</nav>


