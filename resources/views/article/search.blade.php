<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="display-3 my-5">Risultati per la tua ricerca: "{{$search}}"</h1>
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 my-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400, 400) : 'https://picsum.photos/400'}}" class="card-img-top" alt="{{$article->name}}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <h6 class="text-muted fst-italic">{{ $article->price }}$</h6>
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Scopri di più</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3> Nessun articolo corrisponde alla tua ricerca, prova con un'altra parola chiave!</h3>
                <x-searchbar />
            @endforelse
        </div>
    </div>
</x-layout>
