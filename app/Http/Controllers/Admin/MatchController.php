<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * MatchController - Manage Matches in Admin Panel
 * 
 * Menghandle CRUD operations untuk pertandingan
 */
class MatchController extends Controller
{
    /**
     * Display list of matches
     */
    public function index(): View
    {
        $matches = Game::with('team')->paginate(15);

        return view('admin.matches.index', compact('matches'));
    }

    /**
     * Show form to create new match
     */
    public function create(): View
    {
        $teams = Team::all();

        return view('admin.matches.create', compact('teams'));
    }

    /**
     * Store match in database
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'opponent' => 'required|string|max:255',
            'match_date' => 'required|date_format:Y-m-d H:i',
            'location' => 'required|string|max:255',
            'type' => 'required|in:home,away',
            'status' => 'required|in:scheduled,completed,cancelled',
            'team_score' => 'nullable|integer|min:0',
            'opponent_score' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        Game::create($validated);

        return redirect()->route('admin.matches.index')
            ->with('success', 'Pertandingan berhasil ditambahkan');
    }

    /**
     * Show form to edit match
     */
    public function edit(Game $match): View
    {
        $teams = Team::all();

        return view('admin.matches.edit', compact('match', 'teams'));
    }

    /**
     * Update match in database
     */
    public function update(Request $request, Game $match): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'opponent' => 'required|string|max:255',
            'match_date' => 'required|date_format:Y-m-d H:i',
            'location' => 'required|string|max:255',
            'type' => 'required|in:home,away',
            'status' => 'required|in:scheduled,completed,cancelled',
            'team_score' => 'nullable|integer|min:0',
            'opponent_score' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        $match->update($validated);

        return redirect()->route('admin.matches.index')
            ->with('success', 'Pertandingan berhasil diperbarui');
    }

    /**
     * Delete match
     */
    public function destroy(Game $match): RedirectResponse
    {
        $match->delete();

        return redirect()->route('admin.matches.index')
            ->with('success', 'Pertandingan berhasil dihapus');
    }
}
