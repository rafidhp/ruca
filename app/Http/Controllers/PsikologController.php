<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use Illuminate\Http\Request;
use App\Services\HashidsService;

class PsikologController extends Controller
{
    public function dashboard($psikolog_id, HashidsService $hashids)
    {
        $id = $hashids->decode($psikolog_id);
        $psikolog = Psikolog::findOrFail($id);

        return view('psikolog.dashboard', compact('psikolog'));
    }
}