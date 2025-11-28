<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superfans | Ad Management</title>

    <!-- Bootstrap & DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">Ad Management</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <!-- Add New Ad Form Toggle -->
    <button class="btn btn-primary mb-3" onclick="$('#addAdForm').toggle()">Add New Ad</button>

    <!-- Add Ad Form -->
    <div id="addAdForm" class="card p-3 mb-4" style="display: none;">
        <form action="/influencer/ads/add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="media">Media File</label>
                <input type="file" name="media" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="link">Link </label>
                <input type="url" name="link" class="form-control" placeholder="https://...">
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>

    <!-- Ads Table -->
    <table class="table table-bordered table-striped" id="adsTable">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Media</th>
                <th>Link</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ads as $ad)
                <tr>
                    <td>{{ $ad->id }}</td>
                    <td>
                        @if(Str::endsWith($ad->media, ['.mp4', '.webm']))
                            <video width="150" controls>
                                <source src="{{ asset('assets/images/' . $ad->media) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('assets/images/' . $ad->media) }}" width="100" alt="Ad Image">
                        @endif
                    </td>
                    <td>
                        @if($ad->link)
                            <a href="{{ $ad->link }}" target="_blank">{{ $ad->link }}</a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $ad->status ? 'success' : 'secondary' }}">
                            {{ $ad->status ? 'Running' : 'Stopped' }}
                        </span>
                    </td>
                    <td>
                        <form action="/influencer/ads/{{ $ad->id }}/toggle" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-{{ $ad->status ? 'warning' : 'primary' }}">
                                {{ $ad->status ? 'Stop' : 'Play' }}
                            </button>
                        </form>
                        <form action="/influencer/ads/{{ $ad->id }}/delete" method="POST" class="d-inline" onsubmit="return confirm('Delete this ad?')">
                            @csrf
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
    $(document).ready(function () {
        $('#adsTable').DataTable();
    });
</script>

</body>
</html>
