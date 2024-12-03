<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'size_mb' => 'required|integer|min:0|max:999999',
            'image_path' => 'nullable|image|max:2048', // Validasi file gambar
            'status' => 'required|in:active,inactive',
        ]);

        $game = Game::create($request->only('title', 'category', 'size_mb', 'status'));
        if ($request->hasFile('image_path')) {
            $game->image_path = $request->file('image_path')->store('games', 'public');
            $game->save();
        }

        return redirect()->route('games.index')->with(['success' => 'Game berhasil disimpan']);
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'size_mb' => 'required|integer|min:0|max:999999',
            'image_path' => 'nullable|image|max:2048', // Validasi file gambar
            'status' => 'required|in:active,inactive',
        ]);

        $game->update($request->only('title', 'category', 'size_mb', 'status'));
        if ($request->hasFile('image_path')) {
            $game->image_path = $request->file('image_path')->store('games', 'public');
            $game->save();
        }

        return redirect()->route('games.index')->with(['success' => 'Game berhasil diupdate']);
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with(['success' => 'Game berhasil dihapus']);
    }

}

