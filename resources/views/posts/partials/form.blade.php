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
    <label for="category">Category</label>
    <select name="category" id="category" class="custom-select form-control">
        <option disabled selected>Choose one!</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category')
        <small class="text-danger mt-2">
            {{$message}}
        </small>    
    @enderror
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" class="custom-select form-control select2-multiple" multiple>
        @foreach ($post->tags as $tag)
            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach

        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    @error('tags')
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