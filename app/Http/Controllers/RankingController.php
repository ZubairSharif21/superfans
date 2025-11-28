<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RankingController extends Controller
{
    public function index()
    {
        $topUsers = User::orderByDesc('no_of_followers')
            ->limit(1000)
            ->get();

        $superMagic     = $topUsers->slice(0, 11);
        $superLeague    = $topUsers->slice(0, 50);     
        $diamondLeague  = $topUsers->slice(50, 100);  
        $emeraldLeague  = $topUsers->slice(150, 100);   
        $goldLeague     = $topUsers->slice(250, 250);   
        $silverLeague   = $topUsers->slice(500, 500);  

        $totalUsers = User::count();

if ($totalUsers <= 1000) {
    return response()->json(['message' => 'No more users available'], 204); // No Content
}

$bronzeLeague = User::orderByDesc('no_of_followers')
    ->offset(1000)
    ->limit(4)
    ->get();


        return view('rankings.index', compact(
            'superMagic',
            'superLeague',
            'diamondLeague',
            'emeraldLeague',
            'goldLeague',
            'silverLeague',
            'bronzeLeague'
        ));
    }
    
public function loadMoreBronze(Request $request)
{
    try {
        $offset = (int) $request->input('offset', 1000);
        $total = User::count();

        if ($offset >= $total) {
            return response()->json(['message' => 'No more users to load'], 204);
        }

        $users = User::orderByDesc('no_of_followers')
            ->offset($offset)
            ->limit(20)
            ->get();

        $html = '';

        foreach ($users as $index => $user) {
            $html .= view('rankings.row', [
                'user' => $user,
                'index' => $index,
                'offset' => $offset
            ])->render();
        }

        return response($html);

    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ], 500);
    }
}



}
