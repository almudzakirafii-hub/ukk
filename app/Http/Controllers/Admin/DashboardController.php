<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * DashboardController - Admin Dashboard
 * 
 * Menghandle tampilan dashboard admin dengan statistik dan quick actions
 */
class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index(): View
    {
        $stats = [
            'total_players' => \App\Models\Player::count(),
            'total_matches' => \App\Models\Game::count(),
            'total_galleries' => \App\Models\Gallery::count(),
            'total_news' => \App\Models\News::count(),
        ];

        $recentMatches = \App\Models\Game::orderBy('match_date', 'desc')->take(5)->get();
        $recentNews = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMatches', 'recentNews'));
    }
}
