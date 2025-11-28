<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BlockUserController extends Controller
{
    public function block(User $user)
    {
        $me = Auth::user();

        if ($me->id == $user->id) {
            return back()->with('error', 'You cannot block yourself.');
        }

        $me->blockedUsers()->syncWithoutDetaching([$user->id]);
        return back()->with('success', 'User blocked.');
    }

    public function unblock(User $user)
    {
        Auth::user()->blockedUsers()->detach($user->id);
        return back()->with('success', 'User unblocked.');
    }
}
