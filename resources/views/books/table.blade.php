@forelse($books as $book)

<tr>

    <td>{{ $book->id }}</td>

    <td class="text-center">

        @if($book->cover)

            <img
                src="{{ asset('Uploads/books/' . $book->cover) }}"
                alt="{{ $book->judul }}"
                width="70"
                class="img-thumbnail">

        @else

            <span class="text-muted">
                Tidak Ada Cover
            </span>

        @endif

    </td>

    <td>{{ $book->judul }}</td>

    <td>{{ $book->category->nama_kategori ?? '-' }}</td>

    <td>{{ $book->penulis }}</td>

    <td>{{ $book->penerbit }}</td>

    <td>{{ $book->tahun_terbit }}</td>

    <td class="text-center">

        <span class="badge bg-success">
            {{ $book->stok }}
        </span>

    </td>

    <td>

        <a href="{{ route('books.edit', $book->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('books.destroy', $book->id) }}"
              method="POST"
              class="d-inline">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="btn btn-danger btn-sm">
                Hapus
            </button>

        </form>

    </td>

</tr>

@empty

<tr>

    <td colspan="9" class="text-center py-4">
        <strong>Tidak ada data buku.</strong>
    </td>

</tr>

@endforelse