<x-layout>
    <div class="container">
        <div class="row">
            @if ($article_to_check)
                <div class="col-12 col-md-6">
                    <div id="carouselExample" class="carousel slide">
                        @if (count($article_to_check->images) > 1)
                            <div class="carousel-inner">
                                @foreach ($article_to_check->images as $key => $image)
                                    <div class="row">
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <div class="row mb-3">
                                                <img src="{{ $image->getUrl(400, 400) }}" class="card-img-top d-block "
                                                    alt="{{ $article_to_check->name }}, caricata da {{ $article_to_check->user->name }}">
                                            </div>
                                            <div class="row">
                                                <form method="post" action="{{ route('images.destroy', $image->id) }}"
                                                    class="text-center mb-3">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-6">
                                        <p>Adult: <span class="{{ $image->adult }}"></span></p>
                                        <p>Spoof: <span class="{{ $image->spoof }}"></span></p>
                                        <p>Violence: <span class="{{ $image->adult }}"></span></p>
                                        <p>Racy: <span class="{{ $image->adult }}"></span></p>
                                        <p>Medical: <span class="{{ $image->adult }}"></span></p>
                                    </div>
                                    <div class="col-6">
                                        @if ($image->labels)
                                            <p class="d-inline">
                                                @foreach ($image->labels as $label)
                                                    {{ $label }}
                                                @endforeach

                                            </p>
                                        @else
                                            <p>Nessun label rilevato</p>
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @elseif(count($article_to_check->images) == 1)
                            <div class="row">
                                <img src="{{ $article_to_check->images->first()->getUrl(400, 400) }}"
                                    class="d-block w-100"
                                    alt="{{ $article_to_check->name }}, caricata da {{ $article_to_check->user->name }}">
                            </div>
                            @foreach ($article_to_check->images as $image)
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-6">
                                        <p>Adult: <span class="{{ $image->adult }}"></span></p>
                                        <p>Spoof: <span class="{{ $image->spoof }}"></span></p>
                                        <p>Violence: <span class="{{ $image->adult }}"></span></p>
                                        <p>Racy: <span class="{{ $image->adult }}"></span></p>
                                        <p>Medical: <span class="{{ $image->adult }}"></span></p>
                                    </div>
                                    <div class="col-6">
                                        @if ($image->labels)
                                            <p class="d-inline">
                                                @foreach ($image->labels as $label)
                                                    {{ $label }}
                                                @endforeach

                                            </p>
                                        @else
                                            <p>Nessun label rilevato</p>
                                        @endif
                                    </div>

                                </div>
                            @endforeach
                        @else
                            <img src="https://picsum.photos/300" class="d-block w-100" alt="placeholder">
                        @endif

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="">
                        <h3>{{ $article_to_check->name }}</h3>
                        <h5>{{ $article_to_check->price }}</h5>
                        <p>{{ $article_to_check->description }}</p>
                        <p>{{ $article_to_check->category->it }}</p>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center my-5">

                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST"
                        class="w-50">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success p-1 px-3">accetta</button>
                    </form>

                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST"
                        class="w-50">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger p-1 px-3">rifiuta</button>
                    </form>
                </div>
            @else
                <div class="col-12 col-md-9">
                    <h3> Non ci sono articoli da revisionare</h3>
                </div>
            @endif
        </div>
    </div>
    @if ($checked_articles)
        <div class="container">
            <div class="row">
                <h3> Storico delle operazioni</h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Articolo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opzioni</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($checked_articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td><a href="{{ route('article.show', $article) }}"
                                            class="btn btn-primary">{{ $article->name }}</a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('categoryShow', $article->category) }}">{{ $article->category->it }}</a>
                                    </td>
                                    <td>
                                        @if ($article->is_accepted == true)
                                            <p>ACCEPTED</p>
                                        @else
                                            <p>RIFIUTATO</p>
                                        @endif
                                    </td>
                                    <td scope="col">
                                        @if ($article->is_accepted == true)
                                            <form action="{{ route('reject', ['article' => $article]) }}"
                                                method="POST" class="w-50">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger p-1 px-3">rifiuta</button>
                                            </form>
                                        @else
                                            <form action="{{ route('accept', ['article' => $article]) }}"
                                                method="POST" class="w-50">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success p-1 px-3">accetta</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('undo', ['article' => $article]) }}" method="POST"
                                            class="w-50">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary p-1 px-3">Annulla</button>
                                        </form>


                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

</x-layout>
