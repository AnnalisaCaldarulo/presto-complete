<div class="card" style="width: 18rem;">
    <img src="{{ !$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400, 400): 'https://picsum.photos/300' }}"
        class="card-img-top d-block " alt="{{ $article->name }}, caricata da {{ $article->user->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $article->name }}</h5>
        <p class="card-text">{{ $article->description }}</p>
        <p>{{ $article->price }} $</p>
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Vai al dettaglio</a>
        @if ($article->is_selected == false)
            <x-add :article="$article" />
        @endif
    </div>
</div>
