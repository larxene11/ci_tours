<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Bali Tours</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="/dashboard" class="flex items-center text-white py-4 pl-6 nav-item <?= $menu['dashboard']; ?>">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="/data/kategori" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item <?= $menu['kategori']; ?>">
            <i class="fas fa-table mr-3"></i>
            Kategori Paket
        </a>
        <a href="/data/paket" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item <?= $menu['paket']; ?>">
            <i class="fas fa-table mr-3"></i>
            Paket
        </a>
        <a href="/data/pesanan" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item <?= $menu['pesanan']; ?>">
            <i class="fas fa-table mr-3"></i>
            Pesanan
        </a>
    </nav>
</aside>