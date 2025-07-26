<?php

namespace App\Services;

class YoutubeService
{
    /**
     * Extract the YouTube video ID from a URL.
     *
     * @param string $url
     * @return string|null
     */
    public function extractVideoId(string $url): ?string
    {
        preg_match(
            '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|live\/|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
            $url,
            $matches
        );

        return $matches[1] ?? null;
    }
}