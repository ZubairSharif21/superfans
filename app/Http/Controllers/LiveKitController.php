<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Agence104\LiveKit\AccessToken;
use Agence104\LiveKit\AccessTokenOptions;
use Agence104\LiveKit\VideoGrant;

class LiveKitController extends Controller
{
    public function streamToken(Request $request)
    {
        $apiKey = env('LIVEKIT_API_KEY');
        $apiSecret = env('LIVEKIT_API_SECRET');

        $room = $request->input('room', 'default-room');
        $identity = $request->input('user', 'guest_' . rand(1000, 9999));

        $tokenOptions = (new AccessTokenOptions())->setIdentity($identity);
        $videoGrant = (new VideoGrant())
                        ->setRoomJoin(true)
                        ->setRoomName($room);

        $token = (new AccessToken($apiKey, $apiSecret))
                    ->init($tokenOptions)
                    ->setGrant($videoGrant)
                    ->toJwt();

        return response()->json([
            'token' => $token,
            'room' => $room,
            'user' => $identity,
        ]);
    }
}
