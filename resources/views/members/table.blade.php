@forelse($members as $member)

<tr>

    <td>{{ $member->id }}</td>

    <td>{{ $member->nama }}</td>

    <td>{{ $member->alamat }}</td>

    <td>{{ $member->telepon }}</td>

    <td>{{ $member->email }}</td>

    <td>

        <a href="{{ route('members.edit',$member->id) }}"
           class="btn btn-warning btn-sm">

            Edit

        </a>

        <form
            action="{{ route('members.destroy',$member->id) }}"
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

    <td colspan="6" class="text-center">

        Tidak ada data anggota.

    </td>

</tr>

@endforelse