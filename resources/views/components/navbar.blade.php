<nav class="navbar navbar-expand-lg py-3 border-bottom bg-white">
    <div class="container">
        <a class="navbar-brand fw-bold" href=".">CashierApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-0 ms-md-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('home') }} {{ request()->is('/') ? 'active' : ''}}">
                        <i class="bx bx-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class=" nav-link dropdown-toggle  {{ request()->is('kategori*') || request()->is('stok*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-building-house'></i>Barang
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('kategori.index') }}">Daftar Kategori Barang</a></li>
                      <li><a class="dropdown-item" href="{{ route('stok.index') }}">Stok Barang</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{  request()->is('transaksi*') ? 'active' : ''}}" href="{{ route('transaksi.index') }}">
                        <i class='bx bx-objects-horizontal-left'></i> Transaksi
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class=" nav-link btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                  </li>
            </ul>
        </div>
    </div>
</nav>