<x-layout>
    <div class="container height">
        <div class="row h-25 justify-content-center align-items-center">
            <div class="col-12">
                <h2> Ecco gli ultimi annunci: </h2>
            </div>
        </div>
        <div class="row h-75 justify-content-center align-items-center">
            @foreach ($articles as $article)
                <div class="col-auto">
                    <x-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
    @auth
        <div class="container height">
            <div class="row h-25 justify-content-center align-items-center">
                <div class="col-12">
                    <h2>Inizia a pubblicare</h2>
                    <a href="{{route('article.create')}}" class="btn btn-primary">Crea annuncio</a>
                </div>
            </div>
        </div>

    @endauth
</x-layout>
