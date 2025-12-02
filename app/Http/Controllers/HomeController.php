<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * HomeController - Handle homepage dan public pages
 * 
 * Menghandle penampilan halaman depan website termasuk informasi tim,
 * jadwal pertandingan, galeri, berita, dan kontak.
 */
class HomeController extends Controller
{
    /**
     * Display homepage
     * 
     * @return View
     */
    public function index(): View
    {
        $team = \App\Models\Team::where('slug', 'garuda-hustler')->first();
        $players = \App\Models\Player::where('status', 'active')->get();
        $matches = \App\Models\Game::where('status', 'scheduled')
            ->orWhere('status', 'completed')
            ->orderBy('match_date', 'desc')
            ->take(5)
            ->get();
        $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')->take(6)->get();
        $news = \App\Models\News::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home.index', compact('team', 'players', 'matches', 'galleries', 'news'));
    }

    /**
     * Display team information
     * 
     * @return View
     */
    public function team(): View
    {
        $team = \App\Models\Team::where('slug', 'garuda-hustler')->first();
        $players = \App\Models\Player::where('status', 'active')->get();

        return view('home.team', compact('team', 'players'));
    }

    /**
     * Display schedule/matches
     * 
     * @return View
     */
    public function schedule(): View
    {
        $filter = request('filter', 'all');
        $query = \App\Models\Game::query();

        // Apply filter based on status
        if ($filter === 'upcoming') {
            $query->where('status', 'scheduled')->orderBy('match_date', 'asc');
        } elseif ($filter === 'completed') {
            $query->where('status', 'completed')->orderBy('match_date', 'desc');
        } else {
            // All matches
            $query->orderBy('match_date', 'desc');
        }

        $matches = $query->paginate(10);

        return view('home.schedule', compact('matches'));
    }

    /**
     * Display gallery
     * 
     * @return View
     */
    public function gallery(): View
    {
        $galleries = \App\Models\Gallery::orderBy('created_at', 'desc')->paginate(12);

        return view('home.gallery', compact('galleries'));
    }

    /**
     * Display news
     * 
     * @return View
     */
    public function news(): View
    {
        $news = \App\Models\News::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('home.news', compact('news'));
    }

    /**
     * Display single news detail
     * 
     * @param string $slug
     * @return View
     */
    public function newsDetail(string $slug): View
    {
        $article = \App\Models\News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $related = \App\Models\News::where('status', 'published')
            ->where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home.news-detail', compact('article', 'related'));
    }
}
