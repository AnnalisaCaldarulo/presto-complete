<x-layout>
    {{-- <div class="container height margin">
        <div class="row align-items-center justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 my-3">
                    {{-- <div class="card" style="width: 18rem;">
                            <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400, 400) : 'https://picsum.photos/300'}}" class="card-img-top d-block "
                                alt="{{ $article->name }}, caricata da {{ $article->user->name }}">
                     
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <h5 class="card-title pt-3">{{ $article->name }}</h5>
                            <h6 class="text-muted fst-italic">{{ $article->price }}$</h6>
                            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary my-2">Scopri di più</a>
                           <x-add :article="$article" />
                        </div>
                    </div> --}}
    {{-- <x-card :article="$article" /> 
                </div>
            @endforeach
        </div>
    </div> --}}
    <livewire:filter />
</x-layout>
