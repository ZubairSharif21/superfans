<?php

namespace App\Helpers;

use Firebase\JWT\JWT;

class LiveKitToken
{
    public static function generate($room, $user)
    {
        $apiKey = env('LIVEKIT_API_KEY');
        $apiSecret = env('LIVEKIT_API_SECRET');

        $now = time();
        $exp = $now + 3600;

        $payload = [
            "jti" => bin2hex(random_bytes(16)),
            "iss" => $apiKey,
            "sub" => $user,
            "nbf" => $now,
            "exp" => $exp,
            "video" => [
                "roomJoin" => true,
                "room" => $room,
            ],
        ];

        return JWT::encode($payload, $apiSecret, 'HS256');
    }
}
