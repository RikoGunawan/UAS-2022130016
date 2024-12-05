<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class GamingCafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *///Made by: Riko Gunawan

    public function index()
    {
        $computers = Computer::paginate(12); //Untuk membagi penampilan data
        return view('gamingcafe', compact('computers'));

    }

}
