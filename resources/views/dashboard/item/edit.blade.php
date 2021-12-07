@extends('dashboard.layout.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Submissions</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/items/{{ $item->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" class="form-control @error('slug')
            is-invalid
        @enderror" id="slug" name="slug" value="-{{ auth()->user()->username }}">
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name')
                is-invalid
            @enderror" id="name" name="name" required autofocus value="{{ old('name', $item->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @error('slug')
            <div class="invalid-feedback">
                You already use this name
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Category" class="form-label">Category</label>
            <select type="text" class="form-select" name="category_id">
                @if (auth()->user()->is_admin == true)
                    @foreach ($categories as $category)
                        @if (old('category_id', $item->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="1" selected>Keyboard</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label @error('desc')
                is-invalid
            @enderror">Description</label>
            <input id="desc" type="hidden" name="desc" value="{{ old('desc', $item->desc) }}">
            <trix-editor input="desc"></trix-editor>
            @error('desc')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label @error('image')
                is-invalid
            @enderror">Upload Image</label>
            <input type="hidden" name="old_img" value="{{ $item->image }}">
            <input class="form-control" type="file" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
@endsection
