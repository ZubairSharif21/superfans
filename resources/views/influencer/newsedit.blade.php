<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit News</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $news->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $news->content }}</textarea>
        </div>

        <div class="form-group">
            <label>Image (optional)</label><br>
            @if($news->image)
                <img src="{{ asset('uploads/news/' . $news->image) }}" width="100" class="mb-2">
                <input type="hidden" name="old_image" value="{{ $news->image }}">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label>Optional Button Text</label>
            <input type="text" name="button_text" class="form-control" value="{{ $news->button_text }}">
        </div>

        <div class="form-group">
            <label>Optional Button Link</label>
            <input type="url" name="button_link" class="form-control" value="{{ $news->button_link }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $news->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="paused" {{ $news->status == 'paused' ? 'selected' : '' }}>Paused</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update News</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary ml-2">Back</a>
    </form>
</div>

</body>
</html>
