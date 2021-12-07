@extends('layout.main')

@section('content')
<div class="container">
    <h1 class="mb-5 text-center mt-3"> All Items From : {{ $from }}</h1>
    @if ($items->isEmpty())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            data not found
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @include('partial.card')
</div>
<div class=" container d-flex justify-content-end">
    {{ $items ->links() }}
</div>

@endsection
