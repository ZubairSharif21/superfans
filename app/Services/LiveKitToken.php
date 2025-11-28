<?php
namespace App\Services;

use Firebase\JWT\JWT;

class LiveKitToken
{
    public static function generate(string $room, string $identity, string $apiKey, string $apiSecret): string
    {
        $now = time();
        $exp = $now + 3600; // 1 hour expiry

        $payload = [
            'iss' => $apiKey,
            'sub' => $identity,
            'exp' => $exp,
            'nbf' => $now,
            'iat' => $now,
            'grants' => [
                'room' => $room,
            ],
        ];

        return JWT::encode($payload, $apiSecret, 'HS256');
    }
}
