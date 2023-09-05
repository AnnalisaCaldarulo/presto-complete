<form class="d-flex" role="search" action="{{route('article.search')}}" method="GET">
    @csrf
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searched">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>