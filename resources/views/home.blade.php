@extends('layout.main')

@section('content')
<!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://external-preview.redd.it/9RFVjfDOql6MMtorO6i2-HLTbmbBez9FTVCGmCS-z4E.jpg?auto=webp&s=602057d9dd1d8d097bab134732786ecd12496229" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://storage.googleapis.com/mkeu-store-media/cache/b0/18/b018be94df71d66636a9ed37c8efdd8e.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://cdn.shopify.com/s/files/1/0482/3600/3480/products/GMK-Shashin-Keycaps-Mechanical-Keyboard-Vala-Supply-S3LQ-Phoenix-Numpad-Render.png?v=1625086321" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- carousel -->
<!-- content -->
<div class="content mt-3 mb-5">
    <div class="container">
        <h2 class="text-center">Category</h2>
        <div class="row">
            @foreach ($category as $cat)
            <div class="col-lg-3 mt-3">
                <div class="card" style="width: 19rem;">
                    <img src={{ $cat->img_link }} class="card-img-top" alt="{{ $cat->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cat->name }}</h5>
                        <a href="/items?category={{ $cat->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- content -->
@endsection
