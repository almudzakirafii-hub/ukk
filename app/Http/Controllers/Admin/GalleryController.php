<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * GalleryController - Manage Gallery in Admin Panel
 * 
 * Menghandle CRUD operations untuk galeri foto
 */
class GalleryController extends Controller
{
    /**
     * Display list of gallery
     */
    public function index(): View
    {
        $galleries = Gallery::with('team')->paginate(15);

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show form to create new gallery
     */
    public function create(): View
    {
        $teams = Team::all();

        return view('admin.gallery.create', compact('teams'));
    }

    /**
     * Store gallery in database
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'taken_date' => 'nullable|date',
            'category' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/gallery'), $imageName);
            $validated['image'] = 'images/gallery/' . $imageName;
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil ditambahkan');
    }

    /**
     * Show form to edit gallery
     */
    public function edit(Gallery $gallery): View
    {
        $teams = Team::all();

        return view('admin.gallery.edit', compact('gallery', 'teams'));
    }

    /**
     * Update gallery in database
     */
    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'taken_date' => 'nullable|date',
            'category' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/gallery'), $imageName);
            $validated['image'] = 'images/gallery/' . $imageName;
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil diperbarui');
    }

    /**
     * Delete gallery
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        if (file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Foto galeri berhasil dihapus');
    }
}
