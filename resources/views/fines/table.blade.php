@forelse($fines as $fine)

<tr>

    <td>{{ $fine->id }}</td>

    <td>

        {{ $fine->borrowing->member->nama }}

    </td>

    <td>

        Rp {{ number_format($fine->jumlah_denda,0,',','.') }}

    </td>

    <td>

        @if($fine->status_bayar == 'Sudah Bayar')

            <span class="badge bg-success">

                Sudah Bayar

            </span>

        @else

            <span class="badge bg-danger">

                Belum Bayar

            </span>

        @endif

    </td>

    <td>

        <a
            href="{{ route('fines.edit',$fine->id) }}"
            class="btn btn-warning btn-sm">

            Edit

        </a>

        <form
            action="{{ route('fines.destroy',$fine->id) }}"
            method="POST"
            class="d-inline delete-form">

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

    <td colspan="5" class="text-center">

        Tidak ada data denda.

    </td>

</tr>

@endforelse