<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Folder upload cover pada hosting
     */
    private function coverUploadDir()
    {
        return '/home/nmzlpjmw/public_html/Uploads/books';
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $books = Book::with('category')

            ->when($search, function ($query) use ($search) {

                $query->where('judul', 'LIKE', "%{$search}%")
                      ->orWhere('penulis', 'LIKE', "%{$search}%")
                      ->orWhere('penerbit', 'LIKE', "%{$search}%")
                      ->orWhereHas('category', function ($q) use ($search) {

                            $q->where('nama_kategori', 'LIKE', "%{$search}%");

                      });

            })

            ->latest()

            ->get();

        if ($request->ajax()) {

            return view('books.table', compact('books'))->render();

        }

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required',
            'category_id' => 'required'
        ]);

        $cover = null;

        if ($request->hasFile('cover')) {

            if (!file_exists($this->coverUploadDir())) {
                mkdir($this->coverUploadDir(), 0777, true);
            }

            $cover = time() . '.' . $request->cover->extension();

            $request->cover->move(
                $this->coverUploadDir(),
                $cover
            );
        }

        Book::create([
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'cover' => $cover
        ]);

        return redirect()
            ->route('books.index')
            ->with(
                'success',
                'Buku berhasil ditambahkan'
            );
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        return view(
            'books.edit',
            compact(
                'book',
                'categories'
            )
        );
    }

    public function update(Request $request, Book $book)
    {
        $data = [
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok
        ];

        if ($request->hasFile('cover')) {

            if (!file_exists($this->coverUploadDir())) {
                mkdir($this->coverUploadDir(), 0777, true);
            }

            // Hapus cover lama
            if ($book->cover &&
                file_exists($this->coverUploadDir() . '/' . $book->cover)) {

                unlink($this->coverUploadDir() . '/' . $book->cover);
            }

            $cover = time() . '.' . $request->cover->extension();

            $request->cover->move(
                $this->coverUploadDir(),
                $cover
            );

            $data['cover'] = $cover;
        }

        $book->update($data);

        return redirect()
            ->route('books.index')
            ->with(
                'success',
                'Buku berhasil diupdate'
            );
    }

    public function destroy(Book $book)
    {
        if ($book->cover &&
            file_exists($this->coverUploadDir() . '/' . $book->cover)) {

            unlink($this->coverUploadDir() . '/' . $book->cover);
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with(
                'success',
                'Buku berhasil dihapus'
            );
    }
}