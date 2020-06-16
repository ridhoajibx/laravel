<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $post->title }}">
    @error('title')
        <small class="text-danger mt-2">
            {{$message}}
        </small>    
    @enderror
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" name="body" id="body" rows="5" placeholder="Create your post here!">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        <small class="text-danger mt-2">
            {{$message}}
        </small>    
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>