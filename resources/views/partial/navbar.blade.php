<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="/" class="navbar-brand">MechaLib</a>
        <div class="d-flex">
            <form class="input-group" action="/items">
                <input class="form-control" type="search" placeholder="Search" name="search" value="{{ request('search') }}" required>
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
            @auth
            <a class="btn btn-primary ms-2" href="/dashboard" role="button"><i class="bi bi-person-fill"></i></a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger ms-2 bi bi-box-arrow-right"></button>
            </form>
            @else
            <a class="btn btn-primary ms-2" href="/login" role="button"><i class="bi bi-box-arrow-in-right"></i></i></a>
            @endauth
        </div>
    </div>
</nav>
