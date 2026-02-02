<?php

namespace App\Services;

use App\Models\User;

class PlaylistService
{
    public function getPlaylists(User $user)
    {
        $playlists = $user->playlists()->get('title');

        return $playlists;
    }
}
