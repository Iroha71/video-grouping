<?php

namespace App\Http\Controllers;

use App\Consts\AuthConst;
use App\Services\PlaylistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index(Request $request, PlaylistService $service): JsonResponse
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => AuthConst::ERROR_USER_UNAHTHROZED], 401);
        }
        $playlists = $service->getPlaylists($user);

        return response()->json([
            'playlists' => $playlists,
        ]);
    }
}
