<x-layout>

    <div class="container height">
        <div class="row h-75 justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <h3>Immagini dell'articolo</h3>
                <div class="row">
                    @foreach ($article->images as $image)
                        <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                            <div class=" mx-auto shadow rounded"> <img src="{{ Storage::url($image->path) }}"
                                    alt="Immagine per {{ $article->name }}, inserita da {{ $article->user->name }}"
                                    class="img-fluid"></div>

                            <form method="post" action="{{ route('images.destroy', $image->id) }}"
                                class="text-center mb-3">
                                @method('delete')
                                @csrf
                                <button type="submit"
                                    class="btn btn-danger btn-sm shadow d-block text-center mt-2 mx-auto">Delete</button>
                            </form>

                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <livewire:edit-article :article="$article" />
                </div>
            </div>
            <div class="col-12 col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('article.update', compact('article')) }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" value="{{ $article->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" value="{{ $article->price }}" name="price"
                            class="form-control  @error('price') is-invalid @enderror">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label col-12">Descrizione</label>
                        <textarea name="description" cols="30" rows="10" class=" @error('description') is-invalid @enderror">{{ $article->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label col-12">Categoria</label>
                        <select name.defer="category" id="category">
                            @if (App::isLocale('en'))
                                <option selected value="{{ $article->category->id }}">{{ $category->en }}</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category->en }}</option>
                                @endforeach
                            @elseif(App::isLocale('it'))
                                <option selected value="{{ $article->category->id }}">{{ $article->category->it }}
                                </option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->it }}</option>
                                @endforeach

                            @endif

                        </select>
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>


</x-layout>
