<?php

namespace App\Http\Controllers;

use App\Models\AdCampaign;
use App\Models\AdCampaignDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdCreatedUserMail;
use App\Mail\AdCreatedAdminMail;





class AdCenterController extends Controller
{
    /**
     * Centralized valid ad types
     */
    protected $validTypes = [
        'promote-post',
        'clients-form',
        'messages',
        'instagram',
        'calls',
        'whatsapp',
        'website-visits',
    ];

    // Dashboard with cards 
    public function index()
    {
        
                $user= Auth::user();


        $adTypes = $this->validTypes;
    return view('ads.index', compact('adTypes', 'user'));


    }

    // List ads by type
    public function type($type)
    {
        if (! in_array($type, $this->validTypes)) {
            abort(404);
        }

    $ads = AdCampaign::where('type', $type)->where('user_id', auth()->id())->latest()->get();

        // $ads = AdCampaign::where('type', $type)->latest()->get();

        return view('ads.type', compact('type', 'ads'));
    }

    // Show create form
    public function create($type)
    {
        if (! in_array($type, $this->validTypes)) {
            abort(404);
        }

        return view('ads.create', compact('type'));
    }

public function store(Request $request, $type)
{
    if (! in_array($type, $this->validTypes)) {
        abort(404);
    }

    // Base rules
    $rules = [
        'media'     => 'nullable|file|mimes:jpeg,png,jpg,mp4,webm|max:10240',
        'link'      => 'nullable|url',
        'objective' => 'nullable|string',
        'budget'    => 'nullable|numeric',
        'title'     => 'nullable|string|max:255',
        'phone'     => 'nullable|string',
    ];

    if ($type === 'promote-post') {
        $rules['post_id'] = 'required|exists:posts,id';
    }

    $request->validate($rules);

    $mediaName = null;
    $title     = $request->title ?? 'Untitled Ad';
    $postId    = null;

    // === Promote-post ===
    if ($type === 'promote-post') {
        $postId = (int) $request->input('post_id');
        $post   = \App\Models\Post::find($postId);

        if (! $post) {
            return back()->withErrors(['post_id' => "Superfans post not found (post/{$postId})."]);
        }

        $title = $post->title ?? \Illuminate\Support\Str::limit(strip_tags($post->caption ?? ''), 50) ?? $title;

        if (! empty($post->image_video)) {
            $mediaName = $post->image_video; // reuse post media
        }
    }
    // === Instagram Ads ===
    elseif ($type === 'instagram' && $request->link) {
        $mediaName = null; // don’t save expiring image, only link in details
    }
    // === Normal ads ===
    else {
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $mediaName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('assets/images/ads', $mediaName);
        }
    }

    // --- Save campaign first ---
    $campaign = AdCampaign::create([
        'title'     => $title,
        'type'      => $type,
        'user_id'      => auth()->id(),
        'status'    => 'active',
        'media'     => $mediaName,
        'objective' => $request->objective ?? 'promote-content',
        'budget'    => $request->budget ?? 0,
    ]);



    Mail::to(auth()->user()->email)
        ->send(new AdCreatedUserMail($campaign, []));
    
    Mail::to("martinherradadavid@gmail.com")
        ->send(new AdCreatedAdminMail($campaign, []));


    // --- Save extra details ---
    foreach ($request->except(['_token', 'title', 'objective', 'budget', 'media', 'post_id']) as $key => $value) {
        if (filled($value)) {
            AdCampaignDetail::create([
                'campaign_id' => $campaign->id,
                'field_key'   => $key,
                'field_value' => $value,
            ]);
        }
    }

    // Explicit post_id detail
    if ($postId) {
        AdCampaignDetail::create([
            'campaign_id' => $campaign->id,
            'field_key'   => 'post_id',
            'field_value' => $postId,
        ]);
    }

    // Instagram link detail
    if ($type === 'instagram' && $request->link) {
        AdCampaignDetail::create([
            'campaign_id' => $campaign->id,
            'field_key'   => 'link',
            'field_value' => $request->link,
        ]);
    }

    // return redirect()->route('ads.type', $type)
    //                  ->with('success', ucfirst(str_replace('-', ' ', $type)) . ' Ad uploaded!');

    return redirect()->route('ads.type', $type)
    ->with('success', now()->format('H:i') . ' PM – Your ' . ucfirst(str_replace('-', ' ', $type)) . ' campaign has been successfully submitted and is now under review. It will be active within 48 hours.');

}

public function instagramPreview(Request $request)
{
    $url = $request->query('url');

    if (! $url || ! str_contains($url, 'instagram.com/p/')) {
        return response()->json(['image' => null]);
    }

    try {
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url, ['headers' => ['User-Agent' => 'Mozilla/5.0']]);
        $html = (string) $res->getBody();

        // Extract og:image
        preg_match('/<meta property="og:image" content="([^"]+)"/', $html, $matches);
        $image = $matches[1] ?? null;

        return response()->json(['image' => $image]);
    } catch (\Exception $e) {
        return response()->json(['image' => null]);
    }
}



    // Show a single ad campaign
    public function show($type, AdCampaign $ad)
    {
        if ($ad->type !== $type) {
            abort(404);
        }
        if ($ad->user_id !== auth()->id()) {
            abort(403);
        }

        return view('ads.show', compact('ad', 'type'));
    }

    // Edit form
    public function edit($type, AdCampaign $ad)
    {
        if ($ad->type !== $type) {
            abort(404);
        }
        if ($ad->user_id !== auth()->id()) {
            abort(403);
        }

        return view('ads.edit', compact('ad', 'type'));
    }

    // Update campaign + details
   public function update(Request $request, $type, AdCampaign $ad)
{
    if ($ad->type !== $type) {
        abort(404);
    }

    if ($ad->user_id !== auth()->id()) {
        abort(403);
    }

    if ($request->has('status')) {
        $ad->update(['status' => $request->status]);
        return back()->with('success', 'Ad status updated!');
    }

    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'nullable|string',
        'link'    => 'nullable|url',
        'phone'   => 'nullable|string',
    ]);

    $ad->update($request->only('title', 'objective', 'budget', 'status'));

    $ad->details()->delete();
    foreach ($request->except(['_token', '_method', 'title', 'objective', 'budget', 'status']) as $key => $value) {
        if ($value) {
            AdCampaignDetail::create([
                'campaign_id' => $ad->id,
                'field_key'   => $key,
                'field_value' => $value,
            ]);
        }
    }

    return redirect()->route('ads.type', $type)
                     ->with('success', ucfirst(str_replace('-', ' ', $type)) . ' Ad updated!');
}


    // Delete campaign + details
    public function destroy($type, AdCampaign $ad)
    {
        if ($ad->type !== $type) {
            abort(404);
        }
        if ($ad->user_id !== auth()->id()) {
            abort(403);
        }

        $ad->details()->delete();
        $ad->delete();

        return redirect()->route('ads.type', $type)
                         ->with('success', ucfirst(str_replace('-', ' ', $type)) . ' Ad deleted!');
    }
}
