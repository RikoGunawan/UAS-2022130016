<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        $sessions = \App\Models\Session::all();
        $pricings = \App\Models\Pricing::all();

        return view('payments.create', compact('users', 'sessions', 'pricings'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|exists:sessions,id',
            'pricing_id' => 'required|exists:pricings,id',
            'status' => 'required|in:pending,completed,cancelled', // Ubah di sini
        ]);

        // Ambil data session dan pricing
        $session = \App\Models\Session::findOrFail($validated['session_id']);
        $pricing = \App\Models\Pricing::findOrFail($validated['pricing_id']);

        // Hitung durasi aktual dan jumlah unit plan
        $totalMinutes = $session->duration; // Durasi dari sesi
        $unitCount = ceil($totalMinutes / $pricing->duration_minutes); // Hitung jumlah plan yang dibutuhkan
        $totalAmount = $unitCount * $pricing->price; // Total biaya

        // Simpan data pembayaran
        \App\Models\Payment::create([
            'user_id' => $session->user_id, // Ambil user dari sesi
            'session_id' => $session->id,
            'pricing_id' => $pricing->id,
            'amount' => $totalAmount,
            'status' => $validated['status'],
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment successfully processed.');
    }



    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'session_id' => 'required|exists:sessions,id',
            'pricing_id' => 'required|exists:pricings,id',
            'amount' => 'required|numeric|between:0.01,999999.99',
            'status' => 'required|in:pending,completed,failed'
        ]);

        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully');
    }
}
