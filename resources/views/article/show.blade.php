<x-layout>
    <div class="container height">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide">
                    @if (count($article->images) > 1)
                        <div class="carousel-inner">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(400, 400) }}" class="d-block w-100"
                                        alt="{{ $article->name }}, caricata da {{ $article->user->name }}">
                                </div>
                            @endforeach
                        </div>
                        @dd($reg)
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
                    @elseif(count($article->images) == 1)
                        <img src="{{ $article->images->first()->getUrl(400, 400) }}" class="d-block w-100"
                            alt="{{ $article->name }}, caricata da {{ $article->user->name }}">
                    @else
                        <img src="https://picsum.photos/300" class="d-block w-100" alt="placeholder">
                    @endif

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="">
                    <h3>{{ $article->name }}</h3>
                    <h5>{{ $article->price }}</h5>
                    <p>{{ $article->description }}</p>
                    <a href="{{ route('categoryShow', compact('category')) }}">
                        @if (App::isLocale('en'))
                            {{ $category->en }}
                        @elseif(App::isLocale('it'))
                            {{ $category->it }}
                        @endif
                    </a>
                    @if ($article->is_selected == false)
                        <x-add :article="$article" />
                    @endif
                </div>
            </div>
        </div>
        {{-- @auth
        @if ($article->user->id == Auth::user()->id || $article->user->is_revisor == true) --}}
        <div class="row justify-content-center ">
            <div class="col-12">
                <form action="{{ route('article.edit', compact('article')) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-success">Modifica i campi </button>
                </form>
            </div>


        </div>
        {{-- @endif
        @endauth --}}
        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <a href="{{ url()->previous() }}" class="btn btn-primary my-5">Torna indietro</a>
            </div>
        </div>
    </div>

</x-layout>
