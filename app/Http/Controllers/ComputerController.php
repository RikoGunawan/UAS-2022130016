<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::paginate(5);
        return view('computers.index', compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'specifications' => 'required|string',
            'tier' => 'required|in:tier_1,tier_2,tier_3',
            'image_path' => 'nullable|image|max:2048', // Validasi file gambar
            'status' => 'required|in:available,in_use,maintenance',
        ]);


        Computer::create([
            'name' => $request->name,
            'location' => $request->location,
            'specifications' => $request->specifications,
            'tier' => $request->tier,
            'image_path' => $request->image_path,
            'status' => $request->status,

        ]);

        return redirect()->route('computers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        return view('computers.show', compact('computer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {
        return view('computers.edit', compact('computer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'specifications' => 'required|string',
            'tier' => 'required|in:tier_1,tier_2,tier_3',
            'status' => 'required|in:available,in_use,maintenance',
            'image_path' => 'nullable|string',
        ]);

        $computer->update([
            'name' => $request->name,
            'location' => $request->location,
            'specifications' => $request->specifications,
            'tier' => $request->tier,
            'status' => $request->status,
            'image_path' => $request->image_path,
        ]);

        return redirect()->route('computers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computers.index');
    }
}
