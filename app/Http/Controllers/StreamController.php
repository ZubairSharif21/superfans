<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StreamRoom;
use Agence104\LiveKit\AccessToken;
use Agence104\LiveKit\AccessTokenOptions;
use Agence104\LiveKit\VideoGrant;
use App\Models\User;

class StreamController extends Controller
{
    public function createRoom(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|max:255',
            'tags' => 'required|string|max:255'
        ]);

        $roomName = 'room_' . uniqid();

        $room = StreamRoom::create([
            'room_name' => $roomName,
            'bio' => $request->bio,
            'tags' => $request->tags,
            'user_id' => auth()->id() ?? null
        ]);

        return response()->json([
            'roomName' => $room->room_name
        ]);
    }

   public function getStreamToken(Request $request)
{
    $roomName = $request->query('room');
    $userName = $request->query('user');

    if (!$roomName || !$userName) {
        return response()->json(['error' => 'Missing parameters'], 400);
    }

    $apiKey = env('LIVEKIT_API_KEY');
    $apiSecret = env('LIVEKIT_API_SECRET');

    $grant = (new VideoGrant())
        ->setRoomJoin(true)
        ->setRoomName($roomName)
        ->setCanPublish(true)
        ->setCanSubscribe(true);

    $tokenOptions = (new AccessTokenOptions())->setIdentity($userName);

    $accessToken = (new AccessToken($apiKey, $apiSecret))
        ->init($tokenOptions)
        ->setGrant($grant);

    return response()->json([
        'token' => $accessToken->toJwt(),
        'room'  => $roomName,
        'user'  => $userName
    ]);
}

public function startStream($roomName)
{
    
    $userId = auth()->id();
    $user = User::findOrFail($userId);
    $room = StreamRoom::where('room_name', $roomName)->firstOrFail();

    return view('streaming.start-stream', [
        'user_id' =>$userId ,
        'roomName' => $room->room_name,
        'userName' => auth()->user()->name ?? 'GuestUser',
        'bio'      => $room->bio,
        'tags'     => $room->tags,
        'followers' => $user->no_of_followers,
        'profile_picture' => $user->profile_picture,
    ]);
}


}
