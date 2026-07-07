@forelse($borrowings as $borrowing)

<tr>

    <td>{{ $borrowing->id }}</td>

    <td>

        {{ $borrowing->member->nama }}

    </td>

    <td>

        @foreach($borrowing->books as $book)

            {{ $book->judul }}

            @if(!$loop->last)

                ,

            @endif

        @endforeach

    </td>

    <td>

        {{ $borrowing->tanggal_pinjam }}

    </td>

    <td>

        {{ $borrowing->tanggal_kembali }}

    </td>

    <td>

        @if($borrowing->status == 'Dipinjam')

            <span class="badge bg-warning">

                Dipinjam

            </span>

        @else

            <span class="badge bg-success">

                Dikembalikan

            </span>

        @endif

    </td>

    <td>

        <a
            href="{{ route('borrowings.edit',$borrowing->id) }}"
            class="btn btn-warning btn-sm">

            Edit

        </a>

        <form
            action="{{ route('borrowings.destroy',$borrowing->id) }}"
            method="POST"
            class="d-inline delete-form">

            @csrf
            @method('DELETE')

            <button
                class="btn btn-danger btn-sm">

                Hapus

            </button>

        </form>

    </td>

</tr>

@empty

<tr>

    <td colspan="7" class="text-center">

        Tidak ada data peminjaman.

    </td>

</tr>

@endforelse