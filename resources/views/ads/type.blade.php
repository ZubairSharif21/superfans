<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superfans | {{ ucfirst($type) }} Ads</title>

      <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">
	
    <!-- Bootstrap & DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    
    <style>
        .greenlabel {
    border: 2px solid #2ba84a !important;   
    background: #e7f9ec !important;            
    color: #2ba84a;
    border-radius: 7px !important;
    padding: 11px 30px;
    font-family: Consolas, Menlo, Monaco, "Lucida Console", monospace !important;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    /*width: 86.5%;*/
    margin-bottom: 47px !important;
}

.greenlabel p {
    width: 75%;
    margin: 0;
}

.greenlabel h2 {
    width: 2%;
    font-size: 2.3em;
    position: relative;
    top: -4px;
    left: -7px;
}

#greenlabelButton {
    font-weight: 550;
    font-family: Consolas, Menlo, Monaco, "Lucida Console", monospace !important;
    border: 3px solid #000;
    background: #fff;
    padding: 7px 11px;
    color: #111;
    margin-left: 25px;
    cursor: pointer;
    text-decoration: none;
}

#greenlabelButton:hover {
    background: #000;
    color: #fff;
    transition: 0.5s;
}

    </style>
</head>
<body>
<div class="bg-white border-bottom py-2 px-3 d-flex align-items-center shadow-sm">
    <a href="/super-ads" class="d-flex align-items-center text-decoration-none">
        <img src="https://live.superfanss.app/assets/images/Superworld-13.svg" 
             alt="Superfans" height="35" class="mr-2">
        <span class="font-weight-bold text-dark">Back to Ads Dashboard</span>
    </a>
</div>


@php
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\DB;

    // grab current user's posts
    $userPosts = DB::table('posts')
        ->where('influencer_id', auth()->id())
        ->orderBy('id','desc')
        ->limit(50)
        ->get();
@endphp

<div class="container mt-4">

    <h2 class="mb-4">Manage {{ ucfirst($type) }} Ads</h2>

@if(session('success'))
    <div class="greenlabel">
        <h2>✔</h2>
        <p>{{ session('success') }}</p>

        @if(session('show_config_button'))
            <a href="{{ route('ads.index') }}" id="greenlabelButton">Ver configuración</a>
        @endif
    </div>
@endif



    <!-- Add New Ad Form Toggle -->
    <button class="btn btn-primary mb-3" onclick="$('#addAdForm').toggle()">Add New {{ ucfirst($type) }} Ad</button>

    <!-- Add Ad Form -->
    <div id="addAdForm" class="card p-3 mb-4" style="display: none;">
        <form action="{{ route('ads.store', $type) }}" method="POST" enctype="multipart/form-data">
            @csrf

@if($type === 'promote-post')
    <div class="form-group">
        <label>Select one of your posts</label>
        <div class="row" id="postSelector">
            @foreach($userPosts as $post)
                @php
                    $ext = pathinfo($post->image_video, PATHINFO_EXTENSION);
                    $isVideo = in_array(strtolower($ext), ['mp4','webm','mov']);
                @endphp
                <div class="col-4 mb-3">
                    <div class="card selectable-post" data-id="{{ $post->id }}" style="cursor:pointer;">
                        @if($isVideo)
                            <video class="card-img-top" muted>
                                <source src="{{ asset('assets/images/' . $post->image_video) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ asset('assets/images/' . $post->image_video) }}" 
                                 class="card-img-top" alt="Post Image">
                        @endif
                        <div class="card-body p-2 text-center">
                            <small>#{{ $post->id }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- hidden field to hold the selected post -->
        <input type="hidden" name="post_id" id="selectedPostId" required>
    </div>


            @elseif($type === 'clients-form')
                <div class="form-group">
                    <label for="title">Ad Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Get More Clients" required>
                </div>
                <div class="form-group">
                    <label for="budget">Budget</label>
                    <input type="number" name="budget" class="form-control" placeholder="100" min="1">
                </div>
 <div class="form-group">
        <label for="media">Media</label>
        <input required type="file" name="media" class="form-control">
    </div>

            @elseif($type === 'messages')
                <div class="form-group">
                    <label for="title">Ad Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Chat with us!">
                </div>
                <div class="form-group">
                    <label for="link">Message Link (Messenger / Inbox)</label>
                    <input type="url" name="link" class="form-control" placeholder="https://...">
                </div>
                <div class="form-group">
        <label for="media">Media</label>
        <input required type="file" name="media" class="form-control">
    </div>

@elseif($type === 'instagram')
    <div class="form-group">
        <label for="link">Instagram Post Link</label>
        <input type="url" name="link" id="instagramLink" class="form-control" 
               placeholder="https://instagram.com/p/..." required>
    </div>

    <div id="instagramPreview" class="mt-3"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('instagramLink');
        const preview = document.getElementById('instagramPreview');

        input?.addEventListener('input', function () {
            const url = this.value.trim();

            // Reset preview
            preview.innerHTML = '';

            if (!url || !url.includes('instagram.com/p/')) {
                return;
            }

            // ðŸ”‘ Use a quick backend route to fetch OpenGraph image
            fetch(`/ads/instagram/preview?url=${encodeURIComponent(url)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.image) {
                        preview.innerHTML = `
                            <div class="card" style="width: 12rem;">
                                <img src="${data.image}" class="card-img-top" alt="Instagram Preview">
                                <div class="card-body p-2 text-center">
                                    <a href="${url}" target="_blank" class="btn btn-sm btn-primary">View Post</a>
                                </div>
                            </div>
                        `;
                    } else {
                        preview.innerHTML = `<small class="text-muted">No preview available.</small>`;
                    }
                })
                .catch(() => {
                    preview.innerHTML = `<small class="text-danger">Could not load preview.</small>`;
                });
        });
    });
    </script>

@elseif($type === 'calls')
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" class="form-control" placeholder="+1234567890" required>
    </div>
    <div class="form-group">
        <label for="media">Optional Media</label>
        <input type="file" name="media" class="form-control">
    </div>

@elseif($type === 'whatsapp')
    <div class="form-group">
        <label for="whatsapp">WhatsApp Number</label>
        <input type="tel" id="whatsappNumber" class="form-control" placeholder="+1234567890" required>
    </div>

    <div class="form-group">
        <label for="whatsapp_message">WhatsApp Message</label>
        <textarea id="whatsappMessage" class="form-control" placeholder="Type the message people will see when they click the ad"></textarea>
    </div>

    <div class="form-group">
        <label for="media">Media</label>
        <input required type="file" name="media" class="form-control">
    </div>

    <!-- ðŸ”‘ Hidden input that will carry the final link -->
    <input type="hidden" name="link" id="whatsappLink">
<script>
document.addEventListener('DOMContentLoaded', function () {
    const numberInput  = document.getElementById('whatsappNumber');
    const messageInput = document.getElementById('whatsappMessage');
    const hiddenLink   = document.getElementById('whatsappLink');

    function updateLink() {
        const number = numberInput.value.replace(/\D/g, ''); // keep digits only
        const msg    = encodeURIComponent(messageInput.value.trim());

        if (!number) {
            hiddenLink.value = '';
            return;
        }

        let url = `https://wa.me/${number}`;
        if (msg) {
            url += `?text=${msg}`;
        }
        hiddenLink.value = url;
    }

    numberInput.addEventListener('input', updateLink);
    messageInput.addEventListener('input', updateLink);
});
</script>


@elseif($type === 'website-visits')
    <div class="form-group">
        <label for="link">Website Link</label>
        <input type="url" name="link" class="form-control" placeholder="https://example.com" required>
    </div>
    <div class="form-group">
        <label for="media">Optional Media</label>
        <input type="file" name="media" class="form-control">
    </div>
@endif

<button type="submit" class="btn btn-success">Upload</button>
</form>

    </div>

   <!-- Ads Table -->
   <table class="table table-bordered table-striped" id="adsTable">
       <thead class="thead-dark">
           <tr>
               <th>ID</th>
               <th>Preview</th>
               <th>Type</th>
               <th>Status</th>
               <th>Created</th>
               <th>Actions</th>
           </tr>
       </thead>
    <tbody>
@foreach($ads as $ad)
    <tr>
        <td>{{ $ad->id }}</td>
        <td>
            @if($ad->type === 'promote-post')
                @php
                    $postId = $ad->post_id ?? optional(
                        DB::table('ad_campaign_details')
                            ->where('campaign_id', $ad->id)
                            ->where('field_key', 'post_id')
                            ->first()
                    )->field_value;
                    $post = $postId ? DB::table('posts')->where('id', $postId)->first() : null;
                @endphp

                @if($post)
                    @php
                        $ext = pathinfo($post->image_video, PATHINFO_EXTENSION);
                        $isVideo = in_array(strtolower($ext), ['mp4','webm','mov']);
                    @endphp
                    <a href="{{ url('/post/' . $post->id) }}" target="_blank">
                        @if($isVideo)
                            <video width="150" controls muted>
                                <source src="{{ asset('assets/images/' . $post->image_video) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ asset('assets/images/' . $post->image_video) }}" width="150" alt="Post Image">
                        @endif
                    </a>
                    <div class="mt-1 text-muted">Post #{{ $post->id }}</div>
                @else
                    <em>Post not found</em>
                @endif

@elseif($ad->type === 'instagram')
    @php
        // get saved link from details
        $igLink = optional(
            DB::table('ad_campaign_details')
                ->where('campaign_id', $ad->id)
                ->where('field_key', 'link')
                ->first()
        )->field_value;
    @endphp

    @if($igLink)
        <div class="instagram-ad-preview" data-link="{{ $igLink }}">
            <em>Loading preview...</em>
        </div>
       <div class="mt-1">
            <a href="{{ $igLink }}" target="_blank" class="text-primary" style="font-size:0.85rem;">
                ðŸ“· View Instagram Post
            </a>
        </div>
    @else
        <em>No Instagram link</em>
    @endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.instagram-ad-preview').forEach(el => {
        const url = el.dataset.link;
        if (!url) {
            el.innerHTML = `<small class="text-muted">No link found</small>`;
            return;
        }

        fetch(`/ads/instagram/preview?url=${encodeURIComponent(url)}`)
            .then(res => res.json())
            .then(data => {
                if (data.image) {
                    el.innerHTML = `
                        <a href="${url}" target="_blank">
                            <img src="${data.image}" width="150" alt="Instagram Preview">
                        </a>
                        <div class="mt-1 text-muted">Instagram Ad</div>
                    `;
                } else {
                    el.innerHTML = `<small class="text-muted">No preview available</small>`;
                }
            })
            .catch(() => {
                el.innerHTML = `<small class="text-danger">Could not load preview</small>`;
            });
    });
});
</script>



            @else
                {{-- Other ad types --}}
                @if(Str::endsWith($ad->media, ['.mp4', '.webm']))
                    <video width="150" controls>
                        <source src="{{ asset('assets/images/ads/' . $ad->media) }}" type="video/mp4">
                    </video>
                @elseif($ad->media)
                    <img src="{{ asset('assets/images/ads/' . $ad->media) }}" width="100" alt="Ad Image">
                @endif
                    @php
        $linkDetail = DB::table('ad_campaign_details')
            ->where('campaign_id', $ad->id)
            ->where('field_key', 'link')
            ->value('field_value');
    @endphp
           @if($linkDetail)
        <a href="{{ $linkDetail }}" target="_blank" class="d-block mt-1 text-primary">
             View Link
        </a>
    @else
        <div>{{ $ad->title ?? 'Untitled' }}</div>
    @endif
            @endif
        </td>
        <td>{{ $ad->type ?? 'N/A' }}</td>
        <td>
            <span class="badge badge-{{ $ad->status ? 'success' : 'secondary' }}">
                {{ $ad->status ? 'Running' : 'Stopped' }}
            </span>
        </td>
        <td>{{ $ad->created_at ? $ad->created_at->format('Y-m-d H:i') : 'â€”' }}</td>
        <td>
           <form action="{{ route('ads.update', ['type' => $type, 'ad' => $ad->id]) }}" method="POST" class="d-inline">
    @csrf @method('PUT')
    <input type="hidden" name="status" value="{{ $ad->status ? 0 : 1 }}">
    <button class="btn btn-sm btn-{{ $ad->status ? 'warning' : 'primary' }}">
        {{ $ad->status ? 'Stop' : 'Play' }}
    </button>
</form>

            <form action="{{ route('ads.destroy', ['type' => $type, 'ad' => $ad->id]) }}" 
                  method="POST" class="d-inline" onsubmit="return confirm('Delete this ad?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>


   </table>

</div>

<!-- JS Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script>
$('#adsTable').DataTable({
    "columns": [
        null, // ID
        null, // Preview
        null, // Type
        null, // Status
        null, // Created
        { "orderable": false, "searchable": false } // Actions
    ],
    "language": {
        "emptyTable": "No ads found."
    }
});

// Show preview of selected post
$('#post_id').on('change', function() {
    let postId = $(this).val();
    if (!postId) {
        $('#postPreview').html('');
        return;
    }
    $.get('/posts/preview/' + postId, function(html) {
        $('#postPreview').html(html);
    });
});
</script>

<style>
    .selectable-post {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .selectable-post:hover {
        transform: scale(1.02);
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    .selectable-post.selected {
        border: 3px solid #007bff; /* blue border */
        box-shadow: 0 0 15px rgba(0,123,255,0.5);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.selectable-post');
    const hiddenInput = document.getElementById('selectedPostId');

    cards.forEach(card => {
        card.addEventListener('click', function() {
            // remove selection from all
            cards.forEach(c => c.classList.remove('selected'));

            // mark this one as selected
            this.classList.add('selected');

            // update hidden input value
            hiddenInput.value = this.dataset.id;
        });
    });
});
</script>


</body>
</html>
