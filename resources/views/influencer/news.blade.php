<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superfans | News Management</title>

    <!-- Bootstrap & DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">News Management</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <!-- Add New News Form Toggle -->
    <button class="btn btn-primary mb-3" onclick="$('#addNewsForm').toggle()">Add New News</button>

    <!-- Add News Form -->
    <div id="addNewsForm" class="card p-3 mb-4" style="display: none;">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Optional Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="button_text">Optional Button Text</label>
                <input type="text" name="button_text" class="form-control" placeholder="e.g., Read More">
            </div>
            <div class="form-group">
                <label for="button_link">Optional Button Link</label>
                <input type="url" name="button_link" class="form-control" placeholder="https://...">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Post News</button>
        </form>
    </div>

    <!-- News Table -->
    <table class="table table-bordered table-striped" id="newsTable">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Button</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ Str::limit($item->content, 100) }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('uploads/news/' . $item->image) }}" width="80" alt="News Image">
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        @if($item->button_text && $item->button_link)
                            <a href="{{ $item->button_link }}" target="_blank" class="btn btn-info btn-sm">{{ $item->button_text }}</a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $item->status == 'active' ? 'success' : 'secondary' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('news.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this news?')">
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
        $('#newsTable').DataTable();
    });
</script>

</body>
</html>
