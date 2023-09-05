<x-layout>
    <div class="container height">
        <div class="row justify-content-center align-items-center h-100">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$article->images()->first()->getUrl(400, 400) }}" class="card-img-top" alt="{{$article->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <h6 class="text-muted fst-italic">{{ $article->price }}$</h6>
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
