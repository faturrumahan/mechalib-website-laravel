@extends('layout.main')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="row justify-content-center">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
            </div>
        </div>
        <div class="col-lg-6">
            <h1>{{ $item->name }}</h1>
            <small>submitted by <strong>{{ $item->user->username }}</strong></small>
            <p>{!! $item->desc !!}</p>
        </div>
    </div>
</div>
@endsection
