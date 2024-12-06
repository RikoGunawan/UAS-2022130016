<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with(['user', 'computer'])->get();
        return view('sessions.index', compact('sessions'));
    }

    public function create(Request $request)
    {
        // Ambil ID komputer dari query string
        $computerId = $request->input('computer_id');
        $selectedComputer = $computerId ? Computer::find($computerId) : null;

        // Ambil data lainnya
        $users = User::all();
        $computers = Computer::all();

        // Kirim data ke view
        return view('sessions.create', compact('users', 'computers', 'selectedComputer'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'user_id' => 'required|exists:users,id',
            'computer_id' => 'required|exists:computers,id',
        ]);

        $start = Carbon::parse($validated['start_time']);
        $end = Carbon::parse($validated['end_time']);
        $duration = $start->diffInMinutes($end); // Hitung durasi dalam menit

        Session::create([
            'user_id' => $validated['user_id'],
            'computer_id' => $validated['computer_id'],
            'start_time' => $start,
            'end_time' => $end,
            'duration' => $duration, // Simpan durasi
            'status' => $request->status ?? 'ongoing', // Status default 'ongoing' jika tidak diisi
        ]);

        return redirect()->route('sessions.index')->with('success', 'Session created successfully.');
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

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }
}
