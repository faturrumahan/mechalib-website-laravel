@extends('dashboard.layout.main')

@section('content')
<div class="container mt-5 mb-3">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="row justify-content-center">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
            </div>
        </div>
        <div class="col-lg-6">
            <h1>{{ $item->name }}</h1>
            <p>{!! $item->desc !!}</p>
            <a href="/dashboard/items/{{ $item->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/items/{{ $item->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">
                    <span data-feather="x-circle"></span> Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
