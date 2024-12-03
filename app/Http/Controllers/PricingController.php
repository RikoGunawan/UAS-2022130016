<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::all();
        return view('pricings.index', compact('pricings'));
    }

    public function create()
    {
        return view('pricings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:100',
            'price' => 'required|numeric|between:0,999999.99',
            'duration_minutes' => 'required|integer|between:0,999999',
        ]);

        Pricing::create($request->all());
        return redirect()->route('pricings.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Pricing $pricing)
    {
        return view('pricings.edit', compact('pricing'));
    }

    public function update(Request $request, Pricing $pricing)
    {
        $request->validate([
            'plan_name' => 'required|string|max:100',
            'price' => 'required|numeric|between:0,999999.99',
            'duration_minutes' => 'required|integer|between:0,999999',
        ]);

        $pricing->update($request->all());
        return redirect()->route('pricings.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Pricing $pricing)
    {
        $pricing->delete();
        return redirect()->route('pricings.index')->with('success', 'Data berhasil dihapus');
    }
}

