<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function send(Request $request)
    {
        $postId = $request->input('post_id');
        $reason = $request->input('reason');

  $message = "A post has been reported.\n\nPost ID: {$postId}\nPost URL: https://live.superfanss.app/post/{$postId}\nReason: {$reason}";


        // Send email
        Mail::raw($message, function ($mail) {
            $mail->to('dmartinherrada@gmail.com')
                 ->subject('Post Report Notification');
        });

        return response()->json(['success' => true]);
    }
    
public function reportUser(Request $request)
{
    $username = $request->input('username');
    $reason = $request->input('reason');

   $message = "A user has been reported.\n\nUser Name: $username\nReason: $reason\nProfile URL: https://live.superfanss.app/$username";

    // Send email
    Mail::raw($message, function ($mail) {
        $mail->to('dmartinherrada@gmail.com')
             ->subject('User Report Notification');
    });

    return response()->json(['success' => true]);
}



}
