<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use Illuminate\Http\Request;
use App\Services\HashidsService;
use App\Services\YoutubeService;

class PsikologController extends Controller
{
    public function dashboard($psikolog_id, HashidsService $hashids, YoutubeService $youtube_service)
    {
        $id = $hashids->decode($psikolog_id);
        $psikolog = Psikolog::findOrFail($id);

        $url = 'https://www.youtube.com/embed/kNyJPlOdxQs';
        $video_id = $youtube_service->extractVideoId($url);
        dd($video_id);

        return view('psikolog.dashboard', compact('psikolog'));
    }
}