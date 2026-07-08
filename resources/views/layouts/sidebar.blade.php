<div class="sidebar">

    <div>

        <div class="logo-area">

            <i class="fas fa-hat-wizard logo-icon"></i>

            <h2>Hogwarts Library</h2>

        </div>

        <hr>

        <ul class="menu">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-house"></i>
                    Dashboard
                </a>
            </li>

            @if (auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="fas fa-book-open"></i>
                    Kategori
                </a>
            </li>
            @endif

            <li>
                <a href="{{ route('books.index') }}">
                    <i class="fas fa-book"></i>
                    Buku
                </a>
            </li>

            <li>
                <a href="{{ route('members.index') }}">
                    <i class="fas fa-users"></i>
                    Anggota
                </a>
            </li>

            <li>
                <a href="{{ route('borrowings.index') }}">
                    <i class="fas fa-right-left"></i>
                    Peminjaman
                </a>
            </li>

            <li>
                <a href="{{ route('fines.index') }}">
                    <i class="fas fa-sack-dollar"></i>
                    Denda
                </a>
            </li>

            @if (auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('reports.borrowings') }}">
                    <i class="fas fa-file-lines"></i>
                    Laporan Pinjam
                </a>
            </li>

            <li>
                <a href="{{ route('reports.fines') }}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Laporan Denda
                </a>
            </li>
            @endif

        </ul>

    </div>

    <div class="logout-area">

        <form action="{{ route('logout') }}"
              method="POST">

            @csrf

            <button type="submit"
                    class="logout-btn">

                <i class="fas fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </div>

</div>