<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * NewsController - Manage News in Admin Panel
 * 
 * Menghandle CRUD operations untuk berita dan artikel
 */
class NewsController extends Controller
{
    /**
     * Display list of news
     */
    public function index(): View
    {
        $news = News::with('user', 'team')->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show form to create new news
     */
    public function create(): View
    {
        $teams = Team::all();

        return view('admin.news.create', compact('teams'));
    }

    /**
     * Store news in database
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/news'), $imageName);
            $validated['featured_image'] = 'images/news/' . $imageName;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Show form to edit news
     */
    public function edit(News $news): View
    {
        $teams = Team::all();

        return view('admin.news.edit', compact('news', 'teams'));
    }

    /**
     * Update news in database
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            if (file_exists(public_path($news->featured_image))) {
                unlink(public_path($news->featured_image));
            }
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/news'), $imageName);
            $validated['featured_image'] = 'images/news/' . $imageName;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Delete news
     */
    public function destroy(News $news): RedirectResponse
    {
        if (file_exists(public_path($news->featured_image))) {
            unlink(public_path($news->featured_image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
