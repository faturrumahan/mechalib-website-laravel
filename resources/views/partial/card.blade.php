<!-- content -->
<div class="content mb-5 mt-3">
    <div class="container">
        <div class="row">
            @foreach ($items as $item)
            <div class="col-lg-3 mt-2">
                <div class="card" style="width: 19rem;">
                    <img src={{ asset('storage/' . $item->image) }} class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <a href="/items/{{ $item->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- content -->
