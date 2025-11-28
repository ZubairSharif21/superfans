<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    public function uploadProfileImage(Request $request)
    {
        return $this->handleUpload($request, 'profile_image_name');
    }

    public function uploadCoverImage(Request $request)
    {
        return $this->handleUpload($request, 'cover_image_name');
    }

    private function handleUpload(Request $request, $sessionKey)
    {
        $data = $request->image;

        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);

        $decoded = base64_decode($image_array_2[1]);
        $filename = 'image_' . time() . rand(1, 9999) . '.png';
        $full_path = '/home/ednqswmq/live.superfanss.app/assets/images/' . $filename;

        file_put_contents($full_path, $decoded);

        Session::put($sessionKey, $filename);

        return response()->json(['filename' => $filename]);
    }
    
    
}
