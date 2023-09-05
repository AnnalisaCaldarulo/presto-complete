<x-layout>
    <div class="container height">
        <div class="row h-75 justify-content-center align-items-center">
            <h3> risultati per "{{ $category->it }}"</h3>

            @forelse($category->articles as $article)
                @if ($article->is_accepted == true)
                    <div class="col-12 col-md-auto">
                        <x-card :article="$article" />
                    </div>
                @endif
            @empty
                <div>non ci sono articoli</div>
            @endforelse
        </div>
    </div>


</x-layout>
