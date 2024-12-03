<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with(['user', 'computer'])->get();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'computer_id' => 'required|exists:computers,id',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'status' => 'required|in:ongoing,completed,cancelled',
        ]);

        Session::create($request->all());
        return redirect()->route('sessions.index')->with(['success' => 'Sesi berhasil dibuat']);
    }

    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'computer_id' => 'required|exists:computers,id',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'status' => 'required|in:ongoing,completed,cancelled',
        ]);

        $session->update($request->all());
        return redirect()->route('sessions.index')->with(['success' => 'Sesi berhasil diupdate']);
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with(['success' => 'Sesi berhasil dihapus']);
    }
}
