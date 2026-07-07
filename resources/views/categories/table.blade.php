@forelse($categories as $category)

<tr>

    <td>

        {{ $category->id }}

    </td>

    <td>

        {{ $category->nama_kategori }}

    </td>

    <td>

        <a
            href="{{ route('categories.edit',$category->id) }}"
            class="btn btn-warning btn-sm">

            Edit

        </a>

        <form
            action="{{ route('categories.destroy',$category->id) }}"
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

    <td colspan="3" class="text-center">

        Tidak ada data kategori.

    </td>

</tr>

@endforelse