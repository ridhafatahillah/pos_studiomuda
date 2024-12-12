    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <x-nav-link href="/" :active="request()->is('/')">
                <x-slot:icon>bi bi-grid</x-slot:icon>
                Dashboard</x-nav-link>
            <li class="nav-heading">DATA</li>
            <x-nav-link href="rekap" :active="request()->is('rekap')">
                <x-slot:icon>bi bi-currency-dollar</x-slot:icon>
                Rekap</x-nav-link>
            @if (Auth::user()->role == 'admin')
                <x-nav-link href="master" :active="request()->is('master')">
                    <x-slot:icon>bi bi-people</x-slot:icon>
                    Pelanggan</x-nav-link>
            @endif
        </ul>

    </aside><!-- End Sidebar-->
