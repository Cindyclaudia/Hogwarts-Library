<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {

            $query->where('nama_kategori', 'LIKE', "%{$search}%");

        })

        ->latest()

        ->get();

        if ($request->ajax()) {

            return view('categories.table', compact('categories'))->render();

        }

        return view(
            'categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Kategori berhasil ditambahkan'
            );
    }

    public function edit(Category $category)
    {
        return view(
            'categories.edit',
            compact('category')
        );
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Kategori berhasil diupdate'
            );
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Kategori berhasil dihapus'
            );
    }
}