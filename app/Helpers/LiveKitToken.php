<?php

namespace App\Helpers;

use Firebase\JWT\JWT;

class LiveKitToken
{
    public static function generate($apiKey, $apiSecret, $room, $user)
    {
        $now = time();
        $exp = $now + 3600; // Token valid for 1 hour

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
