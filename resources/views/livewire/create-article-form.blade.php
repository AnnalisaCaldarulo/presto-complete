<form class="col-12 mt-5 pt-5" wire:submit.prevent="store()">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" wire:model="price" class="form-control  @error('price') is-invalid @enderror">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="description" class="form-label col-12">Descrizione</label>
        <textarea wire:model="description" cols="30" rows="10" class=" @error('description') is-invalid @enderror"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category" class="form-label col-12">Categoria</label>
        <select wire:model.defer="category" id="category">
            <option value="" label disabled>Seleziona una categoria</option>
            @if (App::isLocale('en'))
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->en }}</option>
                @endforeach
            @elseif(App::isLocale('it'))
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->it }}</option>
                @endforeach

            @endif

        </select>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    {{-- <div class="mb-3">
        <input type="file" wire:model="temporary_images"
            class="form-control  @error('temporary_images.*') is-invalid @enderror" multiple placeholder="Img/">
        @error('temporary_images.*')
            <p class="text-danger mt-2">{{ $message }}</p>
        @enderror
    </div>
    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <h5 class="text-muted">Photo preview:</h5>
                <div class="row rounded py-4 justify-content-around">
                    @foreach ($images as $key => $image)
                    @dd($image->path)
                        <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                            <div class="img-preview mx-auto shadow rounded"
                                style="background-image: url({{ $image->temporaryUrl() }});"> <img
                                    src="{{ $image->temporaryUrl() }}}}" alt="" class="img-fluid"></div>

                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                wire:click="removeImage({{ $key }})">Cancella</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif --}}


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
