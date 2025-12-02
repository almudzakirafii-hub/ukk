<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * PlayerController - Manage Players in Admin Panel
 * 
 * Menghandle CRUD operations untuk pemain (PPL #2-3)
 */
class PlayerController extends Controller
{
    /**
     * Display list of players
     */
    public function index(): View
    {
        $players = Player::with('team')->paginate(15);

        return view('admin.players.index', compact('players'));
    }

    /**
     * Show form to create new player
     */
    public function create(): View
    {
        $teams = Team::all();

        return view('admin.players.create', compact('teams'));
    }

    /**
     * Store player in database
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'name' => 'required|string|max:255',
            'jersey_number' => 'required|unique:players,jersey_number|integer',
            'position' => 'required|string|max:100',
            'height' => 'nullable|integer|min:100|max:250',
            'weight' => 'nullable|integer|min:30|max:200',
            'birth_date' => 'nullable|date|before:today',
            'biography' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        Player::create($validated);

        return redirect()->route('admin.players.index')
            ->with('success', 'Pemain berhasil ditambahkan');
    }

    /**
     * Show form to edit player
     */
    public function edit(Player $player): View
    {
        $teams = Team::all();

        return view('admin.players.edit', compact('player', 'teams'));
    }

    /**
     * Update player in database
     */
    public function update(Request $request, Player $player): RedirectResponse
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'name' => 'required|string|max:255',
            'jersey_number' => 'required|integer|unique:players,jersey_number,' . $player->id,
            'position' => 'required|string|max:100',
            'height' => 'nullable|integer|min:100|max:250',
            'weight' => 'nullable|integer|min:30|max:200',
            'birth_date' => 'nullable|date|before:today',
            'biography' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $player->update($validated);

        return redirect()->route('admin.players.index')
            ->with('success', 'Pemain berhasil diperbarui');
    }

    /**
     * Delete player
     */
    public function destroy(Player $player): RedirectResponse
    {
        $player->delete();

        return redirect()->route('admin.players.index')
            ->with('success', 'Pemain berhasil dihapus');
    }
}
